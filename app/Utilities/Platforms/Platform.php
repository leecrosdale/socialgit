<?php


namespace App\Utilities\Platforms;


use App\Repository;
use GuzzleHttp\Client;

abstract class Platform
{
    public $url;
    public $client;
    public $response;
    public $contents;
    public $name;

    public $path;

    abstract function convertToStandard(Repository $repository);


    public function __construct()
    {
        $this->client = new Client();
    }

    public function getRepository($author, $repository)
    {
        if (!$this->url) throw new \Exception('Url is not set');
        if (!$this->path) throw new \Exception('Path is not set');

        try {
            $this->response = $this->client->get($this->path);
        } catch(\Exception $exception) {
            return \GuzzleHttp\json_encode(['status' => 'error', 'exception' => $exception]);
        }


        $this->contents = $this->response->getBody()->getContents();

        return \GuzzleHttp\json_encode(['status' => 'ok', 'repository' => $this->contents]);

    }



}