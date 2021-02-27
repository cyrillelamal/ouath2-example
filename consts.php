<?php

const IDENTITY_ENDPOINT = "https://github.com/login/oauth/authorize"; // GET
const ACCESS_TOKEN_ENDPOINT = "https://github.com/login/oauth/access_token"; // POST
const API_USER_ENDPOINT = "https://api.github.com/user"; // GET

const CLIENT_ID = "YOUR CLIENT ID"; // The client ID you received from GitHub when you registered.
const REDIRECT_URI = "http://localhost:8000/back.php"; // The URL in your application where users will be sent after authorization.
const SCOPE = "user"; // A space-delimited list of scopes.
const CLIENT_SECRET = "YOU CLIENT SECRET"; // The client secret you received from GitHub for your OAuth App.
