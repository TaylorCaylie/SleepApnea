package main

import (
	"encoding/gob"

	"github.com/gin-contrib/sessions"
	"github.com/gin-contrib/sessions/cookie"
	"github.com/gin-gonic/gin"
)

// NewRouter registers the routes and returns the router.
func NewRouter(auth *Authenticator) *gin.Engine {
	router := gin.Default()

	// To store custom types in our cookies,
	// we must first register them using gob.Register
	gob.Register(map[string]interface{}{})

	store := cookie.NewStore([]byte("secret"))
	router.Use(sessions.Sessions("auth-session", store))

	router.Static("/public", "web/static")
	router.LoadHTMLGlob("templates/*")

	router.GET("/", HomeHandler)
	router.GET("/login", LoginHandler(auth))
	router.GET("/callback", CallbackHandler(auth))
	// TODO: seperate this based on role of user
	// doctor or patient
	router.GET("/user", IsAuthenticated, UserHandler)
	router.GET("/logout", LogoutHandler)

	return router
}
