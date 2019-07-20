@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{$author->name}}/{{ $repository->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>We found this repository on {{ count($foundPlatforms) }} {{ count($foundPlatforms) > 1 ? 'platforms' : 'platform' }}, please pick one!</p>

                        <form method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <select name="platform" class="form-control">
                                        @foreach($foundPlatforms as $platform)
                                            <option>{{ $platform }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <button class="btn btn-success">Select</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
