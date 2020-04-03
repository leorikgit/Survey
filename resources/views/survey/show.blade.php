@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{$questionnaire->title}}</h1>

                <form action="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" method="post">
                    @csrf
                    @foreach($questionnaire->questions as $key =>$question)
                        <div class="card mt-4">
                            <div class="card-header">Question: <strong>{{$key+1}}: </strong>{{$question->question}}</div>

                            <div class="card-body">

                                <ul class="list-group">
                                    @error('responses.'. $key .'.answer_id')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    @foreach($question->answers as $answer)
                                        <label for="answer{{$answer->id}}">

                                            <li class="list-group-item">
                                                <input type="radio" id="answer{{$answer->id}}" name="responses[{{$key}}][answer_id]" value="{{$answer->id}}"
                                                    {{old('responses.'. $key .'.answer_id') == $answer->id ?'checked':''}}>
                                                <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                                                {{$answer->answer}}
                                            </li>
                                        </label>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    <div class="card mt-4">
                        <div class="card-header">Your Information</div>

                        <div class="card-body">
                                <div class="form-group">
                                    <label for="nameId">Name</label>
                                    <input type="text" name="survey[name]" class="form-control" id="nameId" aria-describedby="nameHelp" placeholder="Enter name" value="{{old('survey.name')}}">
                                    @error('survey.name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="emailId">Email</label>
                                    <input type="text" name="survey[email]" class="form-control" id="emailId" aria-describedby="nameHelp" placeholder="Enter email" value="{{old('survey.email')}}">
                                    @error('survey.email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-dark mt-4 block-center">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
