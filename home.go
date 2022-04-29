package main

import (
	"net/http"

	"github.com/gin-gonic/gin"
)

// HomeHandler for our home page.
func HomeHandler(ctx *gin.Context) {
	ctx.HTML(http.StatusOK, "home.html", nil)
}
