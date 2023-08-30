<?php

namespace SearchEngine\cmd;

use SearchEngine\SearchEngine;

trait TShow {
    protected array $SHOW_EX_LIST = [
        'tables'
    ];

    public function show(): void
    {
        $ex = '__SHOW_' . $this->param;
        if ($this->showExListContains()) $this->$ex();
    }

    private function showExListContains(): bool
    {
        if (!in_array($this->param, $this->SHOW_EX_LIST)) {
            $this->__STOP("Show <fg=red>'$this->param'</> is not valid.", 'Show');
            return false;
        }
        return true;
    }

    private function __SHOW_tables(): void
    {
        $data = [];
        $tables = (new SearchEngine())->tables();

        foreach ($tables as $table => $type) $data[] = [$table, $type];
        $this->table(['Index', 'Type'], $data);
    }
}