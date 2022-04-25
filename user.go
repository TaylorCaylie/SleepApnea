package main

import (
	"net/http"

	"github.com/gin-gonic/gin"
)

// PatientHandler for our logged-in user page.
func PatientHandler(ctx *gin.Context) {
	// session := sessions.Default(ctx)
	// profile := session.Get("profile")

	ctx.HTML(http.StatusOK, "patient.html", nil)
}

// DoctorHandler for our logged-in user page.
func DoctorHandler(ctx *gin.Context) {
	// session := sessions.Default(ctx)
	// profile := session.Get("profile")

	ctx.HTML(http.StatusOK, "physician.html", nil)
}
