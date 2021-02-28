<?php
require_once "./params.php";

session_start();
$code = $_GET["code"] ?? null; // The code you received as a response to Step 1.
?>
<h1>Users are redirected back to your site by GitHub.</h1>
<p>
    Code: <b><?= htmlspecialchars($code) ?></b>
</p>
<?php
$body = http_build_query([
    "client_id" => CLIENT_ID, // The client ID you received from GitHub for your OAuth App.
    "client_secret" => CLIENT_SECRET, // The client secret you received from GitHub for your OAuth App.
    "code" => $code,
]);
$ch = curl_init(ACCESS_TOKEN_ENDPOINT);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/json", // See https://docs.github.com/en/developers/apps/authorizing-oauth-apps#response
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch); // The access response.
curl_close($ch);

$access = json_decode($response, true);
$accessToken = $access["access_token"];
$_SESSION["access_token"] = $accessToken;
?>
<hr>
<p>
    Access token: <b><?= $accessToken ?></b>
</p>
<p><a href="/access-token-uses/user.php">The access token allows you to make requests to the API on a behalf of a user.</a></p>