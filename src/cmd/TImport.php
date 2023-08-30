<?php

namespace SearchEngine\cmd;

trait TImport {
    /**
     * @function Import
     * @description Executes user instructions for integrating data
     * from the database into the search engine database.
     */
    public function import(): int|bool {
        $handler = $this->importErrorHandler();
        if ($handler) {
            $this->line("...{$this->param} <fg=white>run</>");
            $this->line('');
            $this->_table->include($this->aliases[$this->param])->import($this->__INSTANCE());
        }
        return $handler;
    }

    private function importErrorHandler(): bool|int {
        if (trim($this->param) === '' or $this->param === null)
            return $this->__STOP('Import source undefined.', 'import');

        if (!array_key_exists($this->param, $this->aliases))
            return $this->__STOP("Class '$this->param' is undefined.", 'import');

        return true;
    }
}