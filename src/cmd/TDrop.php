<?php

namespace Graymore\SearchEngine\cmd;

use Graymore\SearchEngine\SearchEngine;

trait TDrop {
    public function drop(): void {
        if ($this->__CONFIRM("Are you sure you want to DROP the table '{$this->param}'?")) {
            $engine = new SearchEngine();
            $engine->table($this->param)->drop();
            $this->info('Done.');
        }
    }
}