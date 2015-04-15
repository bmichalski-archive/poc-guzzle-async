<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\Response;

require_once __DIR__ . '/vendor/autoload.php';

$client = new Client();

$req = $client->createRequest('GET', 'http://localhost:8080/ws.php?sleep=2', ['future' => true]);

$client->send($req)->then(function (Response $response) {
    var_dump($response->getBody()->getContents());
}, function (RequestException $ex) {
    var_dump($ex->getMessage());
});

$req2 = $client->createRequest('GET', 'http://localhost:8081/ws.php?sleep=1', ['future' => true]);

$client->send($req2)->then(function (Response $response) {
    var_dump($response->getBody()->getContents());
}, function (RequestException $ex) {
    var_dump($ex->getMessage());
});