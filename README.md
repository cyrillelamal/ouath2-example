# GitHub's OAuth2

1. [Create your OAuth2 app](https://github.com/settings/developers)
2. Set the `Authorization callback URL` in the settings of your app to __http://localhost:8000/back.php__
3. Set the `CLIENT_ID` and the `CLIENT_SECRET` constants in the [consts.php](./consts.php)
4. Run the server on the corresponding port, e.g. `php -S localhost:8000`
5. ...profit
