<?php

namespace Graymore\SearchEngine\cmd;

use Symfony\Component\Console\Helper\Table;

trait THelp {
    /**
     * @function Help
     */
    public function help(): void {
        $this->line('');
        $this->line(
            "<options=bold;>╔═╗┌─┐┌─┐┬─┐┌─┐┬ ┬  ╔═╗┌┐┌┌─┐┬┌┐┌┌─┐
╚═╗├┤ ├─┤├┬┘│  ├─┤  ║╣ ││││ ┬││││├┤ 
╚═╝└─┘┴ ┴┴└─└─┘┴ ┴  ╚═╝┘└┘└─┘┴┘└┘└─┘</>");
        $this->line('');

        $this->line("<options=bold;>Executes</>");
        $tableTraitsList = [
            [
                '<fg=green>drop</>',
                '<options=bold;fg=magenta>string</> <fg=white>Table</>',
                '<options=bold>TDrop</>',
            ],
            [
                '<fg=green>import</>',
                '<options=bold;fg=magenta>string</> <fg=white>DataClass</>',
                '<options=bold>TImport</>',
            ],
            [
                '<fg=green>print</>',
                '<options=bold;fg=magenta>string</> <fg=white>Text</>',
                '<options=bold>TPrint</>',
            ],
            [
                '<fg=green>reset</>',
                '<options=bold;fg=magenta>function</> <fg=white>Script</>',
                '<options=bold>TReset</>',
            ],
            [
                '<fg=green>schema</>',
                '<options=bold;fg=magenta>string</> <fg=white>Table</>',
                '<options=bold>TSchema</>',
            ],
            [
                '<fg=green>show</>',
                '<options=bold;fg=magenta>function</> <fg=white>Script</>',
                '<options=bold>TShow</>',
            ],
            [
                '<fg=green>status</>',
                '<options=bold;fg=magenta>string</> <fg=white>Table</>',
                '<options=bold>TStatus</>',
            ],
            [
                '<fg=green>truncate</>',
                '<options=bold;fg=magenta>string</> <fg=white>Table</>',
                '<options=bold>TTruncate</>',
            ],
            [
                '<fg=green>searchd</>',
                '',
                '<options=bold>TSearchd</>',
            ],
            [
                '<fg=green>help, .h </>',
                '',
                '<options=bold>THelp</>',
            ],
            [
                '<fg=green>version, .v </>',
                '',
                '<options=bold>TVersion</>',
            ],
        ];
        $tableTraits = new Table($this->getOutput());
        $tableTraits->setRows($tableTraitsList);
        $tableTraits->setStyle('box');
        $tableTraits->setColumnWidth(2, 10);
        $tableTraits->setColumnWidth(1, 10);
        $tableTraits->setColumnWidth(0, 15);
        $tableTraits->render();

        $this->line('');

        $this->line("<options=bold;>Description</>");
        $descTableRows = [
            [
                ' <fg=green>Invoke</>',
                "The main module for running the shell. It is not recommended to modify this file. It is used for global exceptions and passing parent interfaces.\n"
            ],
            [
                ' <fg=green>Drop</>',
                "Uses SeAPI to call the Drop method for the specified table. May raise unhandled exceptions.\n"
            ],
            [
                ' <fg=green>Help</>',
                "Used to view information of SearchEngine Shell methods. (Obsolete version)\n"
            ],
            [
                ' <fg=green>Import</>',
                "Organizes the convenient execution of indexing tables from your real database. Fully transfers Shell and Output control to the called class for import.\n"
            ],
            [
                ' <fg=green>Print</>',
                "Displays the received message on the screen.\n"
            ],
            [
                ' <fg=green>Reset</>',
                "Performs zeroing of the specified module. Accepts various types and classes as a parameter. Can output unhandled errors.\n"
            ],
            [
                ' <fg=green>Schema</>',
                "Uses SeAPI to decompose the specified table. Displays the data schema of the table that is in the index.\n"
            ],
            [
                ' <fg=green>Searchd</>',
                "Starts execution of the locally installed search engine module. For example, starts the manticore or sphinx service. Required for system operation. The service is configured via SeAPI client().\n"
            ],
            [
                ' <fg=green>Show</>',
                "Performs a demonstration of certain data. Accepts various data types and classes as a parameter. Has its own subroutine and syntax features. Independent module.\n"
            ],
            [
                ' <fg=green>Status</>',
                "Uses SeAPI to call the standard status() method on the index. Outputs the result to the screen.\n"
            ],
            [
                ' <fg=green>Truncate</>',
                "Pretty much the same as Drop(). The difference is that truncate() keeps the original index, but cleans its data.\n"
            ],
            [
                ' <fg=green>Version</>',
                "Auxiliary function that shows which versions of packages and programs were used during development and testing of SearchEngine."
            ],
        ];
        $descTable = new Table($this->getOutput());
        $descTable->setRows($descTableRows);
        $descTable->setColumnWidth(0, 5);
        $descTable->setColumnMaxWidth(1, 60);
        $descTable->setStyle('compact');
        $descTable->render();

        $this->line('');
    }
}