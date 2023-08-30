<?php

namespace SearchEngine\cmd;

use SearchEngine\SearchEngine;

trait TSchema {
    public function schema(): void {
        if ($this->__TABLE_EXISTS__($this->param)) {
            $schema = (new SearchEngine())->table($this->param)->schema();

            $fields = [];

            foreach ($schema as $field => $props) {
                $Type       =  $props['Type'];
                $Properties = $props['Properties'];
                $fields[]   = ["<fg=white>$field</>", "<options=bold;fg=magenta>$Type</>", "<fg=gray>$Properties</>"];
            }

            $this->table(['Fields', 'Type', 'Properties'], $fields);
        } else
            $this->__STOP("Table <fg=red>'$this->param'</> is not found.", 'Schema');
    }
}