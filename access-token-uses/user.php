<?php
require_once "../params.php";

session_start();

$accessToken = $_SESSION["access_token"];
?>
<h1>Use the access token to access the API.</h1>
<?php
$ch = curl_init(API_USER_ENDPOINT);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/vnd.github.v3+json", // See https://docs.github.com/en/rest/reference/users#get-the-authenticated-user
    "Authorization: token {$accessToken}",
    "User-Agent: request",
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch); // Response with public and private profile information
curl_close($ch);

$user = json_decode($response, true);
?>
<hr>
<p>
    Bonjour, <b><?= $user["login"] ?></b>!
</p>
<p>
    You have <b><?= $user["public_repos"] ?> public repos.</b>
</p>
<p>
    <img src="<?= $user["avatar_url"] ?>" alt="<?= $user["login"] ?>">
</p>