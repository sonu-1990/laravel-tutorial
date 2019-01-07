@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="d-flex align-items-center">
                        <h2>Create Question</h2>
                        <a href="{{ route('questions.index') }}" class="btn btn-secondary">Back to all questions.</a>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('questions.store') }}" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} ">
                            <label for="question-title">Question Title.</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Enter Title" class="form-control ">
                            @if ($errors->has('title'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                            <label for="question-body">Explain your question.</label>
                            <textarea  name="body" id="body" class="form-control" rows="10" >
                                {{ old('body') }}
                            </textarea>
                            @if ($errors->has('body'))
                                <div class="help-block">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Ask this question</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
