<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response;

require_once __DIR__ . '/vendor/autoload.php';

$client = new Client();

$start = \microtime(true);

$promise = $client->getAsync(
    'http://localhost:8080/ws.php?sleep=2'
)->then(function (Response $response) {
    var_dump($response->getBody()->getContents());
}, function (RequestException $ex) {
    var_dump($ex->getMessage());
});

$promise2 = $client->getAsync(
    'http://localhost:8081/ws.php?sleep=1'
)->then(function (Response $response) {
    var_dump($response->getBody()->getContents());
}, function (RequestException $ex) {
    var_dump($ex->getMessage());
});

$promises = [
    $promise,
    $promise2
];

$results = Promise\unwrap($promises);

echo 'Took '.(microtime(true) - $start).' seconds'.PHP_EOL;