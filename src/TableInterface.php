<?php

namespace Graymore\SearchEngine;

interface Table
{
    public function __CREATE__(): bool;
    public function __INSERT__(array $fields, int $id): bool;
    public function __DROP__(): bool;
    public function __TRUNCATE__(): bool;
    public function __IMPORT__(mixed $console);
    public function __OPTIMIZE__(bool $sync = false);
}

abstract class TableInterface {}