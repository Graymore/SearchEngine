<?php

namespace SearchEngine\cmd;

trait TPrint {

    /**
     * @function Test
     * @description Returns the specified value, analogous to print.
     */
    public function print(): void {
        $this->line("<bg=blue> >>> </> {$this->param}");
    }
}