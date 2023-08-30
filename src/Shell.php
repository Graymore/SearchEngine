<?php

/*
|--------------------------------------------------------------------------
| Search Engine - Shell module
|--------------------------------------------------------------------------
|
| This module describes the standard behavior and is designed for
| convenient use of complex tasks.
|
*/

namespace SearchEngine;

/** The need to use php artisan api. */
use Illuminate\Console\Command;

use SearchEngine\cmd\INVOKE;
use SearchEngine\cmd\TDrop;
use SearchEngine\cmd\THelp;
use SearchEngine\cmd\TImport;
use SearchEngine\cmd\TReset;
use SearchEngine\cmd\TSchema;
use SearchEngine\cmd\TSearchd;
use SearchEngine\cmd\TPrint;
use SearchEngine\cmd\TShow;
use SearchEngine\cmd\TStatus;
use SearchEngine\cmd\TTruncate;
use SearchEngine\cmd\TVersion;


/** Implementation of the main interface of the module. */
interface SearchShell {
    public function print(): void;
    public function import(): int|bool;
    public function help(): void;
    public function version(): void;
    public function searchd(): void;
    public function truncate(): void;
}

class Shell extends Command implements SearchShell
{

    /** The main functions of the Shell module. */
    use
        INVOKE,
        TSearchd,
        THelp,
        TImport,
        TPrint,
        TTruncate,
        TDrop,
        TStatus,
        TReset,
        TShow,
        TSchema,
        TVersion;

    /*
    |--------------------------------------------------------------------------
    | CORE
    |--------------------------------------------------------------------------
    */

    protected string $execute     = '';
    protected string $param       = '';
    protected array  $aliases;

    protected        $signature   = 'search:shell {execute} {param?}';
    protected        $description = 'Command description';

    protected mixed  $_table;

    public function handle()
    {
        $conf                 = require_once config_path('search.php');

        $this->aliases        = $conf['aliases/data'];
        $this->searchd_path   = $conf['path'];

        $this->v_engine       = $conf['v_engine'];
        $this->v_manticore    = $conf['v_manticore'];
        $this->v_manticorePHP = $conf['v_manticorePHP'];
        $this->v_PHP          = $conf['v_PHP'];

        $this->execute        = strtolower($this->argument('execute'));
        $this->param          = $this->argument('param') ?? '';

        $this->_table         = new ShellTable();

        return $this->__START();
    }
}
