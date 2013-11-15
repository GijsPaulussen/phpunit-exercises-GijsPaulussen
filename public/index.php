<?php
// Set default timezone
date_default_timezone_set('Europe/Brussels');

!defined('APPLICATION_PATH') ?
    define('APPLICATION_PATH', dirname(__DIR__)) : null;

// Set the include paths
set_include_path(
    APPLICATION_PATH .
    PATH_SEPARATOR .
    get_include_path()
);

$config = parse_ini_file(
    dirname(__DIR__) .
    DIRECTORY_SEPARATOR .
    'config' .
    DIRECTORY_SEPARATOR .
    'config.ini'
);

// Autoload composer libs
require 'vendor/autoload.php';

// Load the example classes as well
require 'src/autoload.php';

$dsn = sprintf('sqlite:%s',
    $config['dbname']);

$pdo = new \Pdo($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);


$app = new \Slim\Slim();

$app->get('/', function () use ($app) {
    $app->render('main.php', array ('greeting' => 'Cyclists'));
});

$app->get('/about', function () use ($app) {
    $app->render('about.php');
});

$app->get('/products', function () use ($app, $pdo) {
    $result = $pdo->query('SELECT * FROM `product`', PDO::FETCH_ASSOC);
    $productCollection = new \Utexamples\Model\ProductCollection();
    foreach ($result as $entity) {
        $productCollection->addEntity(new \Utexamples\Model\Product($entity));
    }
    $app->render('list.php', array ('list' => $productCollection));
});

$app->run();