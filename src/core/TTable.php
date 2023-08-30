<?php

namespace Graymore\SearchEngine\core;

trait TTable {
    protected array  $defaultOptions;
    protected mixed  $table;
    protected string $tableName;

    public function table(string $name): static
    {
        $client = $this->client();
        $this->table = $client->index($name);
        $this->search = $this->table->search('');
        $this->tableName = $name;
        return $this;
    }

    public function create(array $columns, array $options = []): static
    {
        $options === [] ? $options = $this->defaultOptions : $options = [];
        $this->table->create($columns, $options);
        return $this;
    }

    public function insert(array $inputs, int $id)
    {
        return $this->table->addDocument($inputs, $id);
    }

    public function inserts(array $inputs, $id)
    {
        return $this->table->addDocuments($inputs, $id);
    }

    public function delete(int $id)
    {
        return $this->table->deleteDocument($id);
    }

    public function drop(bool $silent = false)
    {
        return $this->table->drop($silent);
    }

    public function replace(array $inputs, int $id)
    {
        return $this->table->replaceDocument($inputs, $id);
    }

    public function replaces(array $inputs, int $id)
    {
        return $this->table->replaceDocument($inputs, $id);
    }

    public function schema()
    {
        return $this->table->describe();
    }

    public function status()
    {
        return $this->table->status();
    }

    public function truncate()
    {
        return $this->table->truncate();
    }

    public function update(array $inputs, int $id)
    {
        return $this->table->updateDocument($inputs, $id);
    }
}