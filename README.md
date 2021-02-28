# GitHub's OAuth2

## Configuration

1. [Create your OAuth2 app](https://github.com/settings/developers)
2. Set the `Authorization callback URL` in the settings of your app
3. Set the `CLIENT_ID` and the `CLIENT_SECRET` constants in the [params.php](./params.php)
4. Run the server on the corresponding port, e.g. `php -S localhost:8000`
5. ...profit

## Usage
Start by visiting the index page.

There you can login via GitHub.
If you consent, you will be redirected to the `/back.php`.

There you will get a code and exchange it to an access token.
The access token will be saved in the session.

Then you can use the access token to do something with the GitHub's API, e.g. click the displayed link to see some information about your profile.
