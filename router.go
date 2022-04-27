package main

import (
	"encoding/gob"

	"github.com/gin-contrib/sessions"
	"github.com/gin-contrib/sessions/cookie"
	"github.com/gin-gonic/gin"
)

// NewRouter registers the routes and returns the router.
// The router defined the build of the application
func NewRouter(auth *Authenticator) *gin.Engine {
	router := gin.Default()

	// To store custom types in our cookies,
	// we must first register them using gob.Register
	gob.Register(map[string]interface{}{})

	store := cookie.NewStore([]byte("secret"))
	router.Use(sessions.Sessions("auth-session", store))

	router.Static("/static", "./static")

	// load all the templates
	router.LoadHTMLGlob("templates/*")

	router.GET("/", HomeHandler)
	router.GET("/login", LoginHandler(auth))
	router.GET("/callback", CallbackHandler(auth))
	router.GET("/patient", IsAuthenticated, UserHandler)
	router.GET("/doctor", IsAuthenticated, UserHandler)
	router.GET("/logout", LogoutHandler)
	router.GET("/contact", ContactHandler)

	return router
}
