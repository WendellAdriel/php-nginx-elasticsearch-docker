<?php
    use Elasticsearch\ClientBuilder;

    require '../vendor/autoload.php';

    $client = ClientBuilder::create()->setHosts(['192.168.99.100'])->build();

    /**
     * Index a document
     */
    $params = [
        'index' => 'test',
        'type' => 'users',
        'body' => ['name' => 'Wendell Adriel', 'login' => 'wendell_adriel']
    ];

    $response = $client->index($params);
    var_dump('<pre>', $response, '</pre>', '<hr>');

    /**
     * Searching a document
     */
    $params = [
        'index' => 'atlastock',
        'type' => 'users',
        'body' => [
            'query' => [
                'match' => [
                    'login' => 'wendell_adriel'
                ]
            ]
        ]
    ];

    $response = $client->search($params);
    var_dump('<pre>', $response, '</pre>', '<hr>');
