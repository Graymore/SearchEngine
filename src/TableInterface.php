<?php

namespace Graymore\SearchEngine;

interface Table
{
    public function __CREATE__(array $fields): bool;
    public function __READ__(int $id): array;
    public function __UPDATE__(array $fields, int $id): bool;
    public function __DROP__(): bool;
    public function __DELETE__(int $id): bool;
    public function __TRUNCATE__(): bool;
    public function __INSERT__(array $fields, int $id): bool;
    public function __IMPORT__(mixed $console);
}

abstract class TableInterface {}