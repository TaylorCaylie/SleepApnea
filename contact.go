package main

import (
	"net/http"

	"github.com/gin-gonic/gin"
)

// ContactHandler for our contact page.
func ContactHandler(ctx *gin.Context) {
	ctx.HTML(http.StatusOK, "contact.html", nil)
}
