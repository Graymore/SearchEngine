<?php

namespace Graymore\SearchEngine;

use Manticoresearch\Client;
use Graymore\SearchEngine\core\TClient;
use Graymore\SearchEngine\core\TEffect;
use Graymore\SearchEngine\core\TQuery;
use Graymore\SearchEngine\core\TSearch;
use Graymore\SearchEngine\core\TTable;
use stdClass;

interface Engine {
    public function client(): Client;
    public function host(string $host): static;
    public function port(int $port): static;
    public function limit(int $limit): static;
    public function offset(int $offset): static;
    public function concat(string $str): string;
    public function match(string $value): stdClass;
    public function search(string $typeSearch = 'match'): mixed;
    public function type(string $typeSearch = 'match'): static;
    public function table(string $name): static;
    public function create(array $columns, array $options = []): static;
    public function insert(array $inputs, int $id);
    public function inserts(array $inputs, $id);
    public function delete(int $id);
    public function drop(bool $silent = false);
    public function replace(array $inputs, int $id);
    public function replaces(array $inputs, int $id);
    public function schema();
    public function sql(string $query): array;
    public function status();
    public function truncate();
    public function update(array $inputs, int $id);
    public function sort(string $field, string $direction = 'desc', string $boolean = null): static;
    public function where(string $field, mixed $value, string $operator = '=', string $condition = 'AND'): static;
    public function orWhere(string $field, mixed $value, string $operator = '=', string $condition = 'AND'): static;
    public function notWhere(string $field, mixed $value, string $operator = '=', string $condition = 'AND'): static;
    public function ranker(string $ranker): static;
    public function query(string $query, bool $concat = true): static;
    public function highlight(bool $val = true): static;
    public function optimize(bool $sync = false);
}

class SearchEngine implements Engine {

    use
        /* Instance ClientClass */
        TClient,

        /* Document API */
        TTable,

        /* Query loader */
        TQuery,

        /* Search request */
        TSearch,

        /* Effects */
        TEffect;

    public function __construct() {

        /*
        |--------------------------------------------------------------------------
        | Search Engine configs
        |--------------------------------------------------------------------------
        |
        | Initialization of parameters from configs.
        |
        */

        $configs                    = require config_path('search.php');
        //params ------------------------------------------------------------------
        $this->host                 = $configs['host'];
        $this->port                 = $configs['port'];
        $this->ranker               = $configs['engine']['ranker'];
        $this->concat               = $configs['engine']['concat'];
        $this->defaultOptions       = $configs['options'];
        $this->query_count_limit    = $configs['engine']['query_count_limit'];
    }
}