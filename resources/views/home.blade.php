@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Questionnaire</div>
                <div class="card-body">
                    <button class="btn btn-dark">New Questionnaire</button>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">Questionnaires</div>
                <div class="card-body">
                    @foreach($questionnaires as $questionnaire)
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{$questionnaire->path()}}">{{$questionnaire->title}}</a>
                                <div class="mt-2">
                                    <small class="font-weight-bold">Share URL</small>
                                    <p>
                                        <a href="{{$questionnaire->publicPath()}}">{{$questionnaire->publicPath()}}</a>
                                    </p>

                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
