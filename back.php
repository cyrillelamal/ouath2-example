<?php
// Users are redirected back to your site by GitHub.

require "consts.php";

echo "<h1>The redirect page</h1>";
echo "<p>Sending a POST request to get an access token.</p>";

$ch = curl_init(ACCESS_TOKEN_ENDPOINT);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/json", // See https://docs.github.com/en/developers/apps/authorizing-oauth-apps#response
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    "client_id" => CLIENT_ID, // The client ID you received from GitHub for your OAuth App.
    "client_secret" => CLIENT_SECRET, // The client secret you received from GitHub for your OAuth App.
    "code" => $_GET["code"], // The code you received as a response to Step 1.
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch); // The access response.
curl_close($ch);

$access = json_decode($response);
$accessToken = $access->access_token;
// ====================================
// You are ready to use the GitHub API!
// ====================================
echo "<hr>";
echo "<p>Access token: <b>$accessToken</b></p>";
include "access-token-uses/user.php";
