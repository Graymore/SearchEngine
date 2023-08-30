<?php

namespace SearchEngine\cmd;

use SearchEngine\SearchEngine;

trait TTruncate {
    public function truncate(): void {
        if ($this->__CONFIRM("Are you sure you want to TRUNCATE the table '{$this->param}'?")) {
            $engine = new SearchEngine();
            $engine->table($this->param)->truncate();
            $this->info('Done.');
        }
    }
}