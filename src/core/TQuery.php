<?php

namespace SearchEngine\core;

trait TQuery {
    protected string|null $query = null;
    protected bool        $highlight = false;

    /**
     * init: SearchEngine __construct()
     * conf: config.php (engine)
     */
    protected string $ranker;

    /**
     * init: SearchEngine __construct()
     * conf: config.php (engine)
     */
    protected array  $concat;

    /**
     * init: SearchEngine __construct()
     * conf: config.php (engine)
     */
    protected int    $query_count_limit;

    public function limit(int $limit): static
    {
        $this->search->limit($limit);
        return $this;
    }

    public function offset(int $offset): static
    {
        $this->search->offset($offset);
        return $this;
    }

    public function sort(string $field, string $direction = 'desc', string $boolean = null): static
    {
        /**
         * @supported
         * directions: asc, desc
         * booleans: min, max
         */
        $this->search->sort($field, $direction, $boolean);
        return $this;
    }

    public function where(string $field, mixed $value, string $operator = '=', string $condition = 'AND'): static
    {
        /**
         * @supported
         * operators: =, ==, >, <, >=, <=
         * conditions: AND, OR, NOT
         */
        $this->search->filter($field, $this->whereFormatOperator($operator), $value, $condition);
        return $this;
    }

    public function orWhere(string $field, mixed $value, string $operator = '=', string $condition = 'OR'): static
    {
        /**
         * @supported
         * operators: =, ==, >, <, >=, <=
         * conditions: AND, OR, NOT
         */
        $this->search->orFilter($field, $this->whereFormatOperator($operator), $value, $condition);
        return $this;
    }

    public function notWhere(string $field, mixed $value, string $operator = '=', string $condition = 'NOT'): static
    {
        /**
         * @supported
         * operators: =, ==, >, <, >=, <=
         * conditions: AND, OR, NOT
         */
        $this->search->notFilter($field, $this->whereFormatOperator($operator), $value, $condition);
        return $this;
    }

    public function ranker(string $ranker): static
    {
        $this->search->option('ranker', $this->ranker);
        return $this;
    }

    public function query(string $query, bool $concat = false): static
    {
        if ($concat) $query = $this->concat($query);
        $this->query = $query;
        return $this;
    }

    public function sql(string $query): array
    {
        $client = $this->client();
        return $client->sql($query);
    }

    public function highlight(bool $val = true): static
    {
        $this->highlight = $val;
        return $this;
    }

    public function concat(string $str): string
    {
        $str = str_replace($this->concat, ' ', $str);
        return trim($str) === '' ? "ENGINE_STOP_RANGE_ATTR" : $str;
    }

    public function count(string $operator = 'and'): int
    {
        match ($this->typeSearch) {
            'match' => $data = $this->search
                    ->limit($this->query_count_limit)
                    ->match(['query' => $this->query, 'operator' => $operator])
                    ->get(),
        };
        return $data->count();
    }

    private function whereFormatOperator(string $operator): string
    {
        return match ($operator) {
            '=' => $operator = 'equals',
            '==' => $operator = 'in',
            '<' => $operator = 'lt',
            '>' => $operator = 'gt',
            '<=' => $operator = 'lte',
            '>=' => $operator = 'gte',
            default => 'equals'
        };
    }
}