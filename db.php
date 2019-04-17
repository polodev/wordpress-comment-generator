<?php
namespace rttheme\comment_replicator;

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$db_args = [
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => getenv('DATABASE'),
    'username'  => getenv('DBUSER'),
    'password'  => getenv('PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];

$capsule->addConnection($db_args);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
