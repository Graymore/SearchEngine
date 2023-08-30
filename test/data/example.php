<?php

namespace SearchEngine\data;

interface SearchEngineTable {
    public function __CREATE__(array $fields): bool;
    public function __READ__(int $id): array;
    public function __UPDATE__(array $fields, int $id): bool;
    public function __DROP__(): bool;
    public function __INSERT__(array $fields, int $id): bool;
    public function __IMPORT__(mixed $console);
}

use SearchEngine\SearchEngine;
use SearchEngine\ShellTable;

class example extends ShellTable implements SearchEngineTable
{
    public string $title        = 'Example title.';
    public string $description  = 'Example Description.';
    public string $tableName    = 'example';

    public function __CREATE__(array $fields): bool
    {
        (new SearchEngine())->table($this->tableName)->create($fields);
        return true;
    }

    public function __READ__(int $id): array
    {
        return (new SearchEngine())
            ->sql("SELECT uid FROM {$this->tableName} WHERE uid={$id}");
    }

    public function __UPDATE__(array $fields, int $id): bool
    {
        // TODO: Implement __UPDATE__() method.
        (new SearchEngine())->table($this->tableName)->update($fields, $id);
        return true;
    }

    public function __DROP__(): bool {
        (new SearchEngine())->table($this->tableName)->drop();
        return true;
    }

    public function __INSERT__(array $fields, int $id): bool
    {
        (new SearchEngine())->table($this->tableName)->insert($fields, $id);
        return true;
    }

    public function __IMPORT__(mixed $console): void {
        $console->shell->info('Import is working!');
    }
}