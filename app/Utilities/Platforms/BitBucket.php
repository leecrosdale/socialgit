<?php


namespace App\Utilities\Platforms;


class BitBucket extends Platform
{

    public $url = 'https://api.bitbucket.org';
    public $name = 'BitBucket';

    public const GET_REPO = '/2.0/repositories/';


    public function getRepository($author, $repository)
    {

        $this->path = $this->url . self::GET_REPO . $author . '/' . $repository;

        parent::getRepository($author, $repository);

        return $this->contents ?? null;

    }


}