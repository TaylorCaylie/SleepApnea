package main

import (
	"database/sql"
	"fmt"
	"net/http"

	"github.com/gin-contrib/sessions"
	"github.com/gin-gonic/gin"
)

type patientData struct {
	Date            string
	Time            string
	Autodetected    string
	Heartrate       float64
	Symptoms        string
	NumberOfEpisode float64
}

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

	var data []patientData
	if count == 0 {
		rows, err = db.Query("SELECT * FROM doctor WHERE iddoctor=$1", username)
		if err != nil {
			ctx.HTML(http.StatusOK, "home.html", nil)
			return
		}

		if err == sql.ErrNoRows {
			ctx.HTML(http.StatusOK, "home.html", nil)
			return
		}

		// the user is not a doctor or patient in the
		// db and needs to be added, redirect to home
		if count == 0 {
			ctx.HTML(http.StatusOK, "home.html", nil)
			return
		}

		// expose the data retrieved from the database so that js can retrieve it
		ctx.JSON(http.StatusOK, data)
	} else {
		// if the user is a patient then retrieve their symptom
		// data to be retrieved by js for their personalized portal
		count := 0
		for rows.Next() {
			count += 1

			var d patientData

			if err := rows.Scan(d.Heartrate, d.Symptoms, d.Autodetected, d.NumberOfEpisode); err != nil {
				ctx.HTML(http.StatusOK, "home.html", nil)
				return
			}

			data = append(data, d)
		}

		// expose the data retrieved from the database so that js can retrieve it
		ctx.JSON(http.StatusOK, data)
	}
}
