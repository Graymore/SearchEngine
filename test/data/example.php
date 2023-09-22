<?php

namespace SearchEngine\data;

use SearchEngine\SearchEngine;
use SearchEngine\ShellTable;

class example extends ShellTable
{
    public string $title        = 'Example title.';
    public string $description  = 'Example Description.';
    public string $tableName    = 'example';
    public array $fields = [
        'uid' => ['type' => 'int'],
        'title' => ['type' => 'text'],
        'content' => ['type' => 'text'],
        'tags' => ['type' => 'string'],
        'created_at' => ['type' => 'timestamp'],
        'updated_at' => ['type' => 'timestamp']
    ];

    public function __CREATE__(): bool
    {
        (new SearchEngine())->table($this->tableName)->create($this->fields);
        return true;
    }
    public function __INSERT__(array $fields, int $id): bool
    {
        (new SearchEngine())->table($this->tableName)->insert($fields, $id);
        return true;
    }
    public function __DROP__(): bool {
        (new SearchEngine())->table($this->tableName)->drop();
        return true;
    }
    public function __TRUNCATE__(): bool
    {
        (new SearchEngine())->table($this->tableName)->truncate();
        return true;
    }
    public function __IMPORT__(mixed $console): void {
        $console->shell->info('Import is working!');
    }
    public function __OPTIMIZE__(bool $sync = false): bool {
        (new SearchEngine())->table($this->tableName)->optimize($sync);
        return true;
    }
}