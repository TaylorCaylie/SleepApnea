package main

import (
	"database/sql"
	"fmt"
	"net/http"

	"github.com/gin-contrib/sessions"
	"github.com/gin-gonic/gin"
)

// PatientHandler for our logged-in user page.
func UserHandler(ctx *gin.Context) {
	session := sessions.Default(ctx)
	// profile := session.Get("profile")

	prof := session.Get("profile").(map[string]interface{})

	username := prof["nickname"]

	ctx.Writer.Header().Set("username", fmt.Sprintf("%v", username))

	// connection string
	psqlconn := fmt.Sprintf("host=%s port=%d user=%s "+
		"password=%s dbname=%s sslmode=disable",
		host, port, user, password, dbname)

	// open database
	db, err := sql.Open("postgres", psqlconn)
	if err != nil {
		panic(err)
	}

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
		// db and needs to be added, redirect to home
		if count == 0 {
			ctx.HTML(http.StatusOK, "home.html", nil)
			return
		}

		// Redirect to logged in page based on patient or doctor query
		ctx.HTML(http.StatusOK, "doctor.php", nil)
	} else {
		// Redirect to logged in page based on patient or doctor query
		ctx.HTML(http.StatusOK, "patient.php", nil)
	}
}
