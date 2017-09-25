<?php
//require dirname(__DIR__) . '/vendor/autoload.php';
//
//define('APP', __DIR__);
//
//use Cake\Cache\Cache;
//use Cake\Core\Configure;
//use Cake\Datasource\ConnectionManager;
//
//Configure::write('App', [
//    'namespace' => 'App',
//    'paths' => [
//        'plugins' => [APP . DS . 'testapp' . DS . 'Plugin' . DS],
//    ]
//]);
//
//Cache::config('_cake_core_', [
//    'className' => 'File',
//    'path' => sys_get_temp_dir(),
//]);
//
//if (!getenv('db_dsn')) {
//    putenv('db_dsn=Dilab\CakeMongo\Datasource\Connection://127.0.0.1:27017?database=test&driver=Dilab\CakeMongo\Datasource\Connection');
//}
//
//ConnectionManager::config('test', ['url' => getenv('db_dsn')]);
//ConnectionManager::config('test_cake_mongo', ['url' => getenv('db_dsn')]);
