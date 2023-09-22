# SearchEngine

## TClient

### [client()]()
Returns the `Client` object where `host` and `port` are initialized from the config file.
```php
return $engine->client()
```

### [host(`string $host`)]()
Set `host` parameter.
* Default value from `config/search.php`
```php
$engine->host('127.0.0.1')
```
### [port(`int $port`)]()
Set `port` parameter.
* Default value from `config/search.php`
```php
$engine->port(9308)
```
### [nodes()]()
```php
return $engine->nodes()
```
### [tables()]()
```php
return $engine->tables()
```

## TQuery()

### [limit(`int $limit`)]()
Sets the limit for the query.
```php
$query->limit(25)
```
### [offset(`int $offset`)]()
Sets the offset for the query.
```php
$query->offset(0)
```
### [sort(`mixed $params`)]()
Sets the sorting for the query.
<br>
Params:
* `string $field` - Sorting field
* `string $direction` - Sorting direction `asc` or `desc`
* `string $boolean` - If the MVA attribute can be used `min` or `max`

Examples of sorting:
```php
$engine->sort('year','desc');
$engine->sort('tags','asc','max');
```
### [where()]()
### [orWhere()]()
### [notWhere()]()
### [ranker()]()
### [query()]()
### [sql()]()
### [highlight()]()
### [concat()]()
### [count()]()

## TSearch()

### [search()]()
### [type()]()
### [match()]()

## TTable()

### [table()]()
### [create()]()
### [insert()]()
### [inserts()]()
### [delete()]()
### [drop()]()
### [replace()]()
### [replaces()]()
### [schema()]()
### [status()]()
### [truncate()]()
### [update()]()
### [optimize()]()