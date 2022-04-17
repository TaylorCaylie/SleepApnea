package main

import (
	"net/http"

	"github.com/gin-gonic/gin"
)

// UserHandler for our logged-in user page.
func UserHandler(ctx *gin.Context) {
	// session := sessions.Default(ctx)
	// profile := session.Get("profile")

	ctx.HTML(http.StatusOK, "patient.html", nil)
}
