<?php

namespace Graymore\SearchEngine;

class ShellTable extends TableInterface
{
    protected mixed $instance;

    public function include(mixed $instance): static
    {
        $this->instance = new $instance();
        return $this;
    }

    public function create(array $fields): array {
        return $this->instance->__CREATE__($fields);
    }

    public function insert(array $fields): array {
        return $this->instance->__INSERT__($fields);
    }

    public function truncate(): bool {
        return $this->instance->__TRUNCATE__();
    }

    public function drop(): bool
    {
        return $this->instance->__DROP__();
    }

    public function import(mixed $console)
    {
        $console->shell->line("<bg=blue> >>> </><fg=green> {$this->instance->title}</> {$this->instance->description}");
        return $this->instance->__IMPORT__($console);
    }

    public function optimize(bool $sync = false) {
        return $this->instance->__OPTIMIZE__($sync);
    }
}