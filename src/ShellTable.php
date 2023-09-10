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

    public function delete(int $id): bool {
        return $this->instance->__DELETE__($id);
    }

    public function truncate(): bool {
        return $this->instance->__TRUNCATE__();
    }

    public function read(int $id): array {
        return $this->instance->__READ__($id);
    }

    public function drop(): bool
    {
        return $this->instance->__DROP__();
    }

    public function update(array $fields, int $id): bool {
        return $this->instance->__UPDATE__($fields, $id);
    }

    public function import(mixed $console)
    {
        $console->shell->line("<bg=blue> >>> </><fg=green> {$this->instance->title}</> {$this->instance->description}");
        return $this->instance->__IMPORT__($console);
    }
}