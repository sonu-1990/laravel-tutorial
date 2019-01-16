@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>

                    </div>
                </div>
                <div class="panel-body">
                    @include('layouts._messages')

                    @foreach($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->votes }}</strong> {{ str_plural('vote', $question->votes) }}
                                </div>
                                <div class="status {{ $question->status }}">
                                    <strong>{{ $question->answers_count }}</strong> {{ str_plural('answer', $question->answers_count ) }}
                                </div>
                                <div class="view">
                                    {{ $question->views . " " . str_plural('view', $question->views) }}
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0">
                                        <a href="{{ $question->url }}">{{ $question->title }}</a>
                                    </h3>
                                </div>
                                <p class="lead">
                                    Asked by
                                    <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{ str_limit($question->body, 250) }}
                                <div class="ml-auto">
                                    <p>
                                        {{-- @if (Auth::user()->can('update-question', $question)) --}}
                                        @can ('update', $question)
                                            <a href="{{ route('questions.edit', $question->id )}}" class="btn btn-sm btn-info">Edit</a>
                                        @endcan
                                        {{-- @endif --}}

                                       {{--  @if (Auth::user()->can('delete-question', $question)) --}}
                                        @can ('delete', $question)
                                            <form method="POST" action="{{ route('questions.destroy', $question->id) }}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endcan
                                        {{-- @endif --}}
                                    </p>

                                </div>
                            </div>
                        </div>
                        <hr/>
                    @endforeach

                    <div class="text-center">
                        {{ $questions->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
