package main

import (
	"fmt"
	"net/http"

	"github.com/gin-contrib/sessions"
	"github.com/gin-gonic/gin"
)

// IsAuthenticated is a middleware that checks if
// the user has already been authenticated previously.
func IsAuthenticated(ctx *gin.Context) {
	if sessions.Default(ctx).Get("profile") == nil {
		ctx.Redirect(http.StatusSeeOther, "/")
	} else {
		session := sessions.Default(ctx)
		prof := session.Get("profile").(map[string]interface{})

		username := prof["nickname"]

		ctx.Writer.Write([]byte(fmt.Sprintf("%v", username)))
		ctx.Next()
	}
}
