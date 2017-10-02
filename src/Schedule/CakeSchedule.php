<?php
/**
 * Created by Li
 * Website: www.watchowl.io
 * Date: 2/10/17
 * Time: 7:32 PM
 */

namespace WatchOwl\CakeScheduler\Schedule;

use Crunz\Schedule;

class CakeSchedule extends Schedule
{
    public function shell($command)
    {
        return $this->run('./bin/cake ' . $command);
    }

    public function run($command, array $parameters = [])
    {
        $this->loadCakeBootstrapFile();

        return parent::run($command, $parameters);
    }

    private function loadCakeBootstrapFile()
    {
        $root = $this->findRoot(__FILE__);

        if (!file_exists($root . '/config/bootstrap.php')) {
            throw new \Exception('bootstrap.php file is missing from config');
        }

        require_once $root . '/config/bootstrap.php';
    }

    private function findRoot($root)
    {
        do {
            $lastRoot = $root;
            $root = dirname($root);
            if (is_dir($root . '/vendor/cakephp/cakephp')) {
                return $root;
            }
        } while ($root !== $lastRoot);

        throw new \Exception('Cannot find the root of the application, unable to run tests');
    }
}