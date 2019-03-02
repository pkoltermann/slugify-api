<?php

require_once __DIR__ . "/../vendor/autoload.php";


use Cocur\Slugify\Slugify;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


$request = Request::createFromGlobals();
$subject = substr($request->request->get('subject'), 0, 255);

$slugify = new Slugify();

$responseData = [
    'slug' => $slugify->slugify($subject),
    'host' => gethostname(),
    'node' => getenv("K8S_NODE"),
];

$response = new JsonResponse(
    $responseData,
    JsonResponse::HTTP_OK
);

$response->send();