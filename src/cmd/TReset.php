<?php

namespace SearchEngine\cmd;

trait TReset {
    protected array $RESET_EX_LIST = [
        'tables'
    ];
    public function reset(): void
    {
        $ex = '__RESET_' . $this->param;
        if ($this->resetExListContains()) $this->$ex();
    }

    private function resetExListContains(): bool
    {
        if (!in_array($this->param, $this->RESET_EX_LIST)) {
            $this->__STOP("Reset <fg=red>'$this->param'</> is not valid.", 'Reset');
            return false;
        }
        return true;
    }

    private function __RESET_tables(): void
    {
        if ($this->__CONFIRM("Are you sure you want to RESET ALL TABLES?"))
        {
            foreach ($this->aliases as $key => $class) {
                if ($this->__TABLE_EXISTS__($key)) {
                    if ($this->_table->include($class)->drop())
                        $this->line("Table '{$key}' <fg=green>is dropped.</>");
                } else {
                    $this->line("Table '{$key}' <fg=red>has no indexes in the client.</>");
                }
            }
        } else {
            $this->line("<fg=red>aborted.</>");
        }
    }
}