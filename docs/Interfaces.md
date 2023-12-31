# Interfaces
This describes the standard functions of the [ShellTable](https://github.com/Graymore/SearchEngine/blob/1.x/docs/ShellTable.md) module that must be implemented in your table class.

## File structure
SearchEngine does not limit you in any way in the use of your file structure you can use any methods of building files as long as it is convenient for you.

But we recommend using the following structure for your data:

Create a separate directory in your Models folder and put your classes there.
For example:

* App
  * Models
    * Search
      * Tables
        * posts.php
        * comments.php
        * users.php
        * ...

## Params

### Title
Mandatory parameter for the terminal.
<br>
For example: `public string $title = 'Example title'`

### Description
Mandatory parameter for the terminal.
<br>
For example: `public string $description  = 'Example Description'`

### TableName
Mandatory parameter for the terminal.
<br>
For example: `public string $tableName = 'example'`

## Methods

### `__CREATE__(array $fields)`
Creates a new table with the specified `$fields`.

### `__DROP__()`
Completely deletes the table.

### `__INSERT__(array $fields, int $id)`
Inserts a new record into the table by the specified `$fields` and assigns a unique `$id`.

### `__TRUNCATE__()`
Clears your entire table of documents.

### `__OPTIMIZE__(bool $sync = false)`
Performs optimization of your table.

### `__IMPORT__(mixed $console)`
Performs indexing of your local table from the database. In this method you define how the indexing will be performed. The method accepts `mixed $console` which has `shell` and `output` to output messages to the terminal.