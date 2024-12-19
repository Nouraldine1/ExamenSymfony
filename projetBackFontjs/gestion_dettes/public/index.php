<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require dirname(__DIR__).'/vendor/autoload.php';

$request = Request::createFromGlobals();

// Rediriger l'URL racine vers connexion.html systématiquement
if ($request->getPathInfo() === '/' || $request->getPathInfo() === '/index.html') {
    header('Location: /connexion.html');
    exit;
}

// Gestion des autres requêtes par Symfony (API, etc.)
$kernel = new Kernel($_SERVER['APP_ENV'] ?? 'dev', $_SERVER['APP_DEBUG'] ?? true);
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);