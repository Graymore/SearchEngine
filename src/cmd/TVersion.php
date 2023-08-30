<?php

namespace Graymore\SearchEngine\cmd;

trait TVersion {
    protected string $v_engine;
    protected string $v_manticore;
    protected string $v_manticorePHP;
    protected string $v_PHP;

    /**
     * @function version
     */
    public function version(): void {
        $this->line("Search Engine    ................ <fg=green>v{$this->v_engine}</>");
        $this->line("Manticore        ................ <fg=green>v{$this->v_manticore}</>");
        $this->line("Manticore-PHP    ................ <fg=green>v{$this->v_manticorePHP}</>");
        $this->line("PHP              ................ <fg=green>v{$this->v_PHP}</>");
        $this->line("");
    }
}