@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="d-flex align-items-center">
                        <h2>Edit Question</h2>
                        <a href="{{ route('questions.index') }}" class="btn btn-secondary">Back to all questions.</a>
                    </div>
                </div>
                <div class="panel-body">
                    <h2>{{ $question->title }}</h2>
                    <p>{!! $question->body_html !!} </p>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row vote-controls">
                            <div class="col-md-12">
                                <a title="This question is useful." class="vote-up">Vote Up</a>
                            </div>
                            <div class="col-md-12">
                                <a title="This question is useless." class="vote-down off">Vote Down</a>
                            </div>
                            <div class="col-md-12">
                                <a title="Click to mark as a favourite question (Click again to undo)" class="favourite">Favourite</a>
                                <span class="favourites-count">123</span>
                            </div>
                        </div>
                        <h2>{{ $question->answers_count ." ". str_plural('Answer', $question->answers_count)}}</h2>
                    </div>

                    <hr/>
                    @foreach($question->answers as $answer)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {!! $answer->body_html !!}
                                <p>{{ $answer->created_date }}</p>
                                <p>
                                    <a href="{{ $answer->user->url }}">
                                        <img src="{{ $answer->user->gravatar }}" />
                                    </a>
                                </p>
                                <p>
                                    <a href="{{ $answer->user->url }}">
                                        {{ $answer->user->name }}
                                    </a>
                                </p>

                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
