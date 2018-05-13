# Justify framework
PHP simple WEB MVC framework

After download do not forget install composer dependencies:
`composer install --no-dev`

## Folders
* **bootstrap** - Initial Files
* **config** - config files
* **controllers** - your controllers
* **core** - kernel components of framework
* **mail** - your email templates
* **models** - your models
* **views** - your views
* **web** - your frontend files

## Config files
Config files located in `config` directory
* **db.php** - stores data base settings
* **routes.php** - routes of application. Key is URI regExp pattern, value is <controller>/<action> (without brackets)
* **settings.php** - main array with all setting
* **web.php**- web components for HTML page

## Migrations
I decided to use Phinx migrations. Checkout <http://docs.phinx.org/en/latest/index.html>
Your migration files located in `database/migrations`.
Your seeds files located in `database/seeds`.
