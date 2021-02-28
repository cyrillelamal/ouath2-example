<?php
require_once "./params.php";

$uri = IDENTITY_ENDPOINT . "?" . http_build_query([
    "client_id" => CLIENT_ID,
    "redirect_uri" => REDIRECT_URI,
    "scope" => SCOPE,
]);
?>
<h1>Users are redirected to request their GitHub identity.</h1>
<p>
    <a href="<?= $uri ?>">Send the request: <b><?= htmlspecialchars($uri) ?></b></a>
</p>