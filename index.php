<?php
require './vendor/autoload.php';

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

// looks inside *this* directory
$fileLocator = new FileLocator(array(__DIR__."/config"));
$loader = new YamlFileLoader($fileLocator);
$routes = $loader->load('routes.yml');


$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

$parameters = $matcher->match($request->getPathInfo());
//var_dump($parameters);

$controller = explode('::', $parameters['_controller'])[0];
$action = explode('::', $parameters['_controller'])[1];

unset($parameters['_controller']);
unset($parameters['_route']);

call_user_func_array([new $controller(), $action], $parameters);

function render($fileName, $data) {
    if (!file_exists( $fileName)) {
        // le chemin de la vue ne correspond pas à un fichier existant
        throw new \InvalidArgumentException('Fichier de vue '.$fileName.' non trouvé');
    }

    require_once('./views/head.html.php');
    require_once($fileName);
    require_once('./views/foot.html.php');
    return $data;
}

//var_dump($parameters);
