package main

import (
	"database/sql"
	"fmt"
	"net/http"

	"github.com/gin-contrib/sessions"
	"github.com/gin-gonic/gin"
)

// CallbackHandler for our callback.
func CallbackHandler(auth *Authenticator) gin.HandlerFunc {
	return func(ctx *gin.Context) {
		session := sessions.Default(ctx)
		if ctx.Query("state") != session.Get("state") {
			ctx.String(http.StatusBadRequest, "Invalid state parameter.")
			return
		}

		// Exchange an authorization code for a token.
		token, err := auth.Exchange(ctx.Request.Context(), ctx.Query("code"))
		if err != nil {
			fmt.Println(err)

			ctx.String(http.StatusUnauthorized, "Failed to convert an authorization code into a token.")
			return
		}

		idToken, err := auth.VerifyIDToken(ctx.Request.Context(), token)
		if err != nil {
			ctx.String(http.StatusInternalServerError, "Failed to verify ID Token.")
			return
		}

		var profile map[string]interface{}
		if err := idToken.Claims(&profile); err != nil {
			ctx.String(http.StatusInternalServerError, err.Error())
			return
		}

		session.Set("access_token", token.AccessToken)

		session.Set("profile", profile)

		if err := session.Save(); err != nil {
			ctx.String(http.StatusInternalServerError, err.Error())
			return
		}

		// connection string
		psqlconn := fmt.Sprintf("host=%s port=%d user=%s "+
			"password=%s dbname=%s sslmode=disable",
			host, port, user, password, dbname)

		// open database
		db, err := sql.Open("postgres", psqlconn)
		if err != nil {
			panic(err)
		}

		username := profile["nickname"]

		session.Set("username", username)

		rows, err := db.Query("SELECT * FROM patient WHERE idpatient=$1", username)
		if err != nil {
			panic(err)
		}

		count := 0
		for rows.Next() {
			count += 1
		}

		if count == 0 {
			rows, err = db.Query("SELECT * FROM doctor WHERE iddoctor=$1", username)
			if err != nil {
				panic(err)
			}

			count := 0
			for rows.Next() {
				count += 1
			}

			// the user is not a doctor or patient in the
			// db and needs to be added
			if count == 0 {
				panic("not a doctor or patient, needs to be implemented")
			}

			// Redirect to logged in page based on patient or doctor query
			ctx.Redirect(http.StatusTemporaryRedirect, "/doctor")

		} else {
			// Redirect to logged in page based on patient or doctor query
			ctx.Redirect(http.StatusTemporaryRedirect, "/patient")
		}
	}
}
