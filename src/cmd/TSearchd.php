<?php

namespace SearchEngine\cmd;

use Symfony\Component\Process\Process;

trait TSearchd {
    protected string $searchd_path;
    public function searchd(): void {
        $searchd = $this->searchd_path;
        $this->info('Check file exists...');

        if (file_exists($searchd)) {
            $this->info('Try run service from ' . $searchd);
            sleep(1);
            $process = new Process([$searchd]);
            $process->run(function ($type, $buffer): void {
                if (Process::ERR === $type) {
                    echo 'ERR > '.$buffer;
                } else {
                    echo 'OUT > '.$buffer;
                }
            });
        } else {
            $this->line("<fg=red>SearchEngine::class -> searchd caused an exception.</>");
            $this->line("<fg=red>Unable to open file</> " . $searchd);
        }
    }
}