# Installation
Installing the package is very easy. But you need to strictly follow the installation rules to do so:

#### 1. Install or Update the package with composer
`composer require graymore/search-engine`

#### 2. Publish config and Shell Commands
`php artisan vendor:publish --provider="Graymore\SearchEngine\SearchServiceProvider"`

This command will publish the `search.php` file to `config/search.php` and connect the Shell module to your local terminal.

#### 3. Setting file
`app/search.php`