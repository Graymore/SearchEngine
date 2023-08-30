<?php

namespace Graymore\SearchEngine\core;

use stdClass;

trait TSearch {
    protected mixed  $search;
    protected string $typeSearch = 'match';

    public function search(string $typeSearch = 'match'): mixed
    {
        $this->typeSearch = strtolower($typeSearch);
        $fn = $this->typeSearch;
        return $this->$fn();
    }

    public function type(string $typeSearch = 'match'): static
    {
        $this->typeSearch = strtolower($typeSearch);
        return $this;
    }

    public function match(string $operator = 'and'): stdClass
    {
        $match = $this->search;
        if ($this->query === 'ENGINE_STOP_RANGE_ATTR') return $this->useNullableEffect();
        if ($this->query !== null) $match = $this->search->match(['query' => $this->query, 'operator' => $operator]);
        if ($this->highlight) $match->highlight();
        return $this->useEffect($match->get());
    }
}