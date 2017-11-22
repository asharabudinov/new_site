<?php
$uri = $_SERVER['REQUEST_URI'];

if (strpos($uri, 'callbackhandle.php') !== false) {
	require_once('callbackhandle.php');
	return;
}

if (!(strpos($uri, 'callback') !== false || strpos($uri, 'item/edit') !== false)) {

    if (strpos($uri, 'lazernaya')) {
        require_once("lazernaya-epilyasia.html");
        return;
    } elseif (strpos($uri, 'test.html') !== false) {
        require_once("test.html");
        return;
    } elseif (strpos($uri, 'payment-result') !== false) {
        require_once("paymentResult.php");
        return;
    }  elseif (strpos($uri, 'pay.js') !== false) {
        require_once("payjs.php");
        return;
    } elseif (strpos($uri, 'index.html') !== false) {
        require_once("index.html");
        return;
    } elseif (strpos($uri, 'promo-body') !== false) {
        require_once("promo-body.html");
        return;
    } elseif (strpos($uri, 'permanentnyi-makiyag.html')) {
        require_once("permanentnyi-makiyag.html");
        return;
    } elseif (strpos($uri, '?') === 1 || strpos($uri, 'index.html') !== false || strpos($uri, '') === 0 || strpos($uri, '/') === 0 || strpos($uri, 'v2') === 0) {
        $cookie = $_COOKIE["land"];
        require_once("index.html");
        return;
    }

}

#   readFile("index.html"); return;
#

#f (strpos($uri, 'index.html') !== false) {
#   readFile("index.html"); return;
#


#switch($uri){
#	case '': readFile("index.html"); return;
#	case '/': readFile("index.html"); return;

#}

$subDomain = substr($_SERVER['SERVER_NAME'], 0, stripos($_SERVER['SERVER_NAME'], '.'));
switch ($subDomain) {
    case 'dev':
        $environment = 'dev';
        break;
    case 'stage':
        $environment = 'stage';
        break;
    default:
        $environment = 'prod';
}
unset($subDomain);

if (count(explode('.', $_SERVER['SERVER_NAME'])) === 1) {
    $environment = 'dev';
}

ini_set('display_errors', $environment === 'prod' ? 'Off' : 'On');
error_reporting(E_ALL & ~E_NOTICE);

define('DS', DIRECTORY_SEPARATOR);

require_once 'core/Application.php';

$app = new Application($environment, isset($_GET['fix']));
unset($environment);

if ($app->environment !== 'prod') {
    $app->addBasicAuth($app->config['basicAuthUser'], $app->config['basicAuthPassword']);
}

if (isset($_GET['fix']) && $_GET['fix'] === $app->config['fixPassword']) {
    $app->addBasicAuth($app->config['basicAuthUser'], $app->config['basicAuthPassword']);
    $app->fix();
    exit();
}

if (isset($_GET['backup']) && $_GET['backup'] === $app->config['backupPassword']) {
    $app->addBasicAuth($app->config['basicAuthUser'], $app->config['basicAuthPassword']);
    $app->createBackup();
    exit();
}

echo $app->render();
