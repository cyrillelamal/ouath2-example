<?php
// Users are redirected to request their GitHub identity.

require "consts.php";

$uri = IDENTITY_ENDPOINT . "?" . http_build_query([
    "client_id" => CLIENT_ID,
    "redirect_uri" => REDIRECT_URI,
    "scope" => SCOPE,
    // "state" => bin2hex(random_bytes(127)), // CSRF-protection
]);

echo "<h1>The login page</h1>";
echo "<p>You have to send the get request: <b>" . htmlspecialchars($uri) . "</b>.</p>";
echo "<a href=\"$uri\">Send the request.</a>";
