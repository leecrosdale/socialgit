<?php


namespace App\Utilities\Platforms;


class GitLab extends Platform
{

    public $url = 'https://gitlab.com';
    public $name = 'GitLab';

    protected const GET_REPO = '/api/v4/projects/';

    public function getRepository($author, $repository)
    {

        $this->path = $this->url . self::GET_REPO . urlencode($author . '/' . $repository);

        parent::getRepository($author, $repository); // TODO: Change the autogenerated stub

        return $this->contents ?? null;

    }


}