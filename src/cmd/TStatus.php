<?php

namespace Graymore\SearchEngine\cmd;

use SearchEngine\SearchEngine;

trait TStatus {
    public function status(): void {
        $engine = new SearchEngine();
        $status = $engine->table($this->param)->status();
        foreach ($status as $item) $this->info($item);
    }
}