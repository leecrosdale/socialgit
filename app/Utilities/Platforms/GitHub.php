<?php


namespace App\Utilities\Platforms;


class GitHub extends Platform
{

    public $url = 'https://api.github.com';
    public $name = 'GitHub';

    protected const GET_REPO = '/repos/';

    public function getRepository($author, $repository)
    {

        $this->path = $this->url . self::GET_REPO . $author . '/' . $repository;

        parent::getRepository($author, $repository);
        return $this->contents ?? null;

    }


}