<?php
/**
 * Created by Li
 * Website: www.watchowl.io
 * Date: 2/10/17
 * Time: 7:32 PM
 */

namespace WatchOwl\CakeScheduler\Shell;

use Cake\Console\Shell;

/**
 * CakeScheduler shell command.
 */
class CakeSchedulerShell extends Shell
{
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        $parser->addSubcommand('run', [
            'parser' => [
                'description' => [
                    __('Run the scheduler'),
                ]
            ]
        ]);

        $parser->addSubcommand('view', [
            'parser' => [
                'description' => [
                    __('List of scheduled cron jobs'),
                ]
            ]
        ]);

        return $parser;
    }

    public function main()
    {
        $this->out($this->OptionParser->help());
        return true;
    }

    public function run()
    {
        echo shell_exec('./vendor/bin/crunz schedule:run ./schedule');
        echo PHP_EOL;
    }

    public function view()
    {
        echo shell_exec('./vendor/bin/crunz schedule:list ./schedule');
        echo PHP_EOL;
    }
}
