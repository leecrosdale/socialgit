<?php

namespace App\Http\Controllers;

use App\Author;
use App\Enums\RepositoryStatus;
use App\Platform;
use App\Repository;
use App\RepositoryData;
use App\Utilities\RepositoryFinder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Author $author, Repository $repository)
    {

        if (!$author->exists || !$repository->exists || $repository->status === RepositoryStatus::NOT_SETUP) {

            // We don't have this on record, where is it?
            // GitHub / GitLab / BitBucket

            $finder = new RepositoryFinder($author, $repository);

            if (empty($finder->found)) {
                return abort(404);
            }

            $author->save();
            $repository->save();

            foreach ($finder->platforms as $platform) {
                if ($platform->contents) {
                    RepositoryData::create([
                        'repository_id' => $repository->id,
                        'platform_id' => Platform::where('name', $platform->name)->firstOrFail()->id,
                        'data' => \GuzzleHttp\json_decode($platform->contents)
                    ]);
                }
            }

            if (count($finder->found) === 1) {
                $this->assignPlatform($repository, $finder->found[0]);
            } else {
                return view('repository.new')->withRepository($repository)->withAuthor($author)->withFoundPlatforms($finder->found);
            }

        }
        return view('repository.index')->withRepository($repository)->withAuthor($author)->withPlatform($repository->platform);
    }

    public function setup(Author $author, Repository $repository) : Response
    {
        $this->assignPlatform($repository, request()->get('platform'));
        return back();
    }

    private function assignPlatform(Repository $repository, $platformName) : bool
    {
        $platform = Platform::where('name', $platformName)->firstOrFail();

        $repository->status = RepositoryStatus::SETUP;
        $repository->platform_id = $platform->id;

        $repository->datum()->where('platform_id', '!=', $platform->id)->delete();

        return $repository->save();

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Repository $repository
     * @return \Illuminate\Http\Response
     */
    public function show(Repository $repository)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Repository $repository
     * @return \Illuminate\Http\Response
     */
    public function edit(Repository $repository)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Repository $repository
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repository $repository)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Repository $repository
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repository $repository)
    {
        //
    }
}
