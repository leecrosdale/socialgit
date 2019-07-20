<?php

namespace App\Http\Controllers;

use App\Author;
use App\Platform;
use App\Repository;
use App\Utilities\RepositoryFinder;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Author $author, Repository $repository)
    {

        if (!$author->exists || !$repository->exists) {

            // We don't have this on record, where is it?
            // GitHub / GitLab / BitBucket

            $finder = new RepositoryFinder($author, $repository);

            if (empty($finder->found)) {
                return abort(404);
            }

            $platform_ids = [];

            foreach ($finder->found as $found) {
                $platform_ids[] = Platform::where('name', $found)->firstOrFail()->id;
            }

            $author->save();
            $repository->save();

            $repository->platforms()->sync($platform_ids);

        }

        return view('repository.index')->withRepository($repository)->withAuthor($author)->withPlatforms($repository->platforms);

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
