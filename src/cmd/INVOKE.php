<?php

namespace Graymore\SearchEngine\cmd;

use SearchEngine\SearchEngine;

trait INVOKE {
    public function __INSTANCE(): \stdClass {
        $shell = new \stdClass();
        $shell->shell = $this;
        $shell->output = $this->getOutput();

        return $shell;
    }

    private function __START(): mixed {
        return $this->__PRESENCE() ? $this->__MUTATE() :
            $this->__STOP("descriptor <fg=red>{$this->execute}</> is not valid.", 'Shell');
    }

    private function __STOP(string $message, string $in): int {
        $this->line("<bg=red>Shell cannot be performed with message:</> <$message>");
        $this->line("<fg=red>In:</> {$in}");
        $this->line("<fg=red>closed</>.");
        return 0;
    }

    private function __MUTATE() {
        return match($this->execute) {
            '.v', 'version' => $this->version(),
            '.h', 'help'    => $this->help(),
            default         => $this->{$this->execute}(),
        };
    }

    private function __PRESENCE(): bool {
        return in_array($this->execute, [
            'print',
            'import',
            'reset',
            'show',
            'truncate',
            'drop',
            'status',
            'schema',
            'searchd',
            'help',
            'version',
            '.v',
            '.h',
        ]);
    }

    private function __CONFIRM(string $message): bool {
        return $this->confirm($message);
    }

    public function __TABLE_EXISTS__(string $tableName): bool {
        return key_exists($tableName, (new SearchEngine())->tables());
    }
}