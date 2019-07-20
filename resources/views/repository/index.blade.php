@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Statistics
                    </div>
                    <div class="class-body p-1">
                        <div class="row p-1">
                            <div class="col-md-4">
                                <b>Repository</b>
                            </div>
                            <div class="col-md-8">
                                {{$author->name}}/{{ $repository->name }}
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4">
                                <b>Members</b>
                            </div>
                            <div class="col-md-8">
                                {{ $repository->users->count() }}
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4">
                                <b>Last Active</b>
                            </div>
                            <div class="col-md-8">
                                {{ $repository->updated_at->diffForHumans() }}
                            </div>
                        </div>

                        <hr />

                        <div class="row p-1">
                            <div class="col-md-4">
                                <b>PRs</b>
                            </div>
                            <div class="col-md-8">
                                <a href="#">url here</a>
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4">
                                <b>Issues</b>
                            </div>
                            <div class="col-md-8">
                                <a href="#">url here</a>
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4">
                                <b>Last Merge</b>
                            </div>
                            <div class="col-md-8">

                            </div>
                        </div>

                        <hr/>
                        <b>Branches</b>
                        <div class="row p-1">
                            <div class="col-md-4">
                                <b>Active</b>
                            </div>
                            <div class="col-md-8">
                                <a href="#">url here</a>
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4">
                                <b>Stale</b>
                            </div>
                            <div class="col-md-8">
                                <a href="#">url here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$author->name}}/{{ $repository->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

{{--                        <chat-component :chat="{{ $repository->chat }}"></chat-component>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
