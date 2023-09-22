# ShellTable

This module uses an implementation of your table class [interfaces](https://github.com/Graymore/SearchEngine/blob/1.x/docs/Interfaces.md).

The standard use of this module is via the terminal. But you can also use it in any models or controllers using php.

### include(mixed $instance)
Connects the table class.

### create(array $fields)
Heir `__CREATE__` from [interfaces](https://github.com/Graymore/SearchEngine/blob/1.x/docs/Interfaces.md).

### drop()
Heir `__DROP__` from [interfaces](https://github.com/Graymore/SearchEngine/blob/1.x/docs/Interfaces.md).

### insert(array $fields)
Heir `__INSER__` from [interfaces]().

### truncate()
Heir `__TRUNCATE__` from [interfaces](https://github.com/Graymore/SearchEngine/blob/1.x/docs/Interfaces.md).

### optimize(bool $sync = false)
Heir `__OPTIMIZE__` from [interfaces](https://github.com/Graymore/SearchEngine/blob/1.x/docs/Interfaces.md).

### import(mixed $console)
Heir `__IMPORT__` from [interfaces](https://github.com/Graymore/SearchEngine/blob/1.x/docs/Interfaces.md).