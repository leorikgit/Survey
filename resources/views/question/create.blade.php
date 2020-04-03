@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new question.</div>

                    <div class="card-body">
                        <form action="/questionnaires/{{$questionnaire->id}}/questions" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" name="question[question]" class="form-control" id="question" aria-describedby="questionHelp" placeholder="Enter question">
                                <small id="questionHelp" class="form-text text-muted">Give simple and to-the-point questions for best results.</small>
                                @error('question.question')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <fieldset>
                                <legend>Choices</legend>
                                <small id="answersHelp" class="form-text text-muted">Gives choices that give you the most insight into your question..</small>
                                @for($i = 0;  $i <=3 ; $i++)
                                    <div class="form-group">
                                        <label for="answer{{$i}}">Choice {{$i}}</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer{{$i}}" aria-describedby="answersHelp" placeholder="Enter answer">

                                        @error('answers.'.$i.'.answer')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                @endfor
                            </fieldset>




                            <button type="submit" class="btn btn-dark">Create new question.</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
