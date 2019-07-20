<?php

namespace App\Utilities;

use App\Author;
use App\Repository;
use App\Utilities\Platforms\BitBucket;
use App\Utilities\Platforms\GitHub;
use App\Utilities\Platforms\GitLab;

class RepositoryFinder
{

    public $found = [];
    public $platforms = [];

    private $author;
    private $repository;




    public function __construct(Author $author, Repository $repository)
    {
        $this->author = $author;
        $this->repository = $repository;

        $this->platforms = [
            new GitHub(),
            new GitLab(),
            new BitBucket(),
        ];

        $this->findRepository();

    }

    public function findRepository()
    {
        foreach ($this->platforms as $k => $platform) {
            $this->platforms[$k]->found = $platform->getRepository($this->author->name, $this->repository->name);

            if ($this->platforms[$k]->found) {
                $this->found[] = $platform->name;
            }

        }
        return $this->platforms;
    }

}