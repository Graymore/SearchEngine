# Shell
Designed to use ShearchEngine in your terminal.

## Builder
Unlike [SearchEngine](https://github.com/Graymore/SearchEngine/blob/1.x/docs/SearchEngine.md) this module does not have a full-fledged builder.
All commands are executed from the `php artisan` shell.
<br>
For example: `php artisan search:shell import posts`

## Commands

### searchd
Runs the searchd executable in your terminal.

### help or .h
Outputs help information.

### version or .v
Outputs version information.

### import
Calls the `__IMPORT__()` method on the specified table.
<br>
<br>
* Takes the class name from `config/search.php [aliases/data]`. For example: `php artisan search:shell import posts`

### print
Outputs the specified text.
<br>
<br>
For example: `php artisan search:shell print "Hello SearchEngine!"`

### truncate
Calls the `truncate()` method on the specified table.

### drop
Calls the `drop()` method on the specified table.

### reset
Performs reset methods for the specified model.
<br>
<br>
Available models:
* `tables` - Points to all tables in the database.

### reset
Performs show methods for the specified model.
<br>
<br>
Available models:
* `tables` - Points to all tables in the database.

### schema
Calls the `schema()` method on the specified table.