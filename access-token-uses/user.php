<?php
// Use the access token to access the API.

$ch = curl_init(API_USER_ENDPOINT);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/vnd.github.v3+json", // See https://docs.github.com/en/rest/reference/users#get-the-authenticated-user
    "Authorization: token {$accessToken}",
    "User-Agent: request",
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch); // Response with public and private profile information
curl_close($ch);

$user = json_decode($response);
echo "<hr>";
echo "<p>Your login is: <b>{$user->login}</b>.</p>";
echo "<p>Salut ! <img src=\"{$user->avatar_url}\" alt=\"{$user->login}\"></p>";
echo "<p>You have <b>{$user->public_repos}</b> public repo(s).";
