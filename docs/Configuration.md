# Configuration

## File configuration

After a complete installation, you should have a file `config/search.php`.
This file is a global add-on for SearchEngine.

To fully utilize SearchEngine, you need to implement your [interfaces](https://github.com/Graymore/SearchEngine/blob/1.x/docs/Interfaces.md).

### config params

#### General

* aliases/data - Used by SearchEngine to connect the table class
* shell - Enables or disables the use of the Shell module
* path - Connects the executable `searchd` script
* sphinx/data - You must specify the full path to the `data` directory. It is used inside SearchEngine
* host - IP or DNS of the server (part of a connection)
* port - HTTP API port (part of a connection)

#### Engine
* ranker - Search algorithm
* query_count_limit - Specifies the maximum number of requests
* concat - Trim characters for the query

#### Search Options
These settings are used for searching. Read more at [Manticore Docs](https://manual.manticoresearch.com/Introduction).