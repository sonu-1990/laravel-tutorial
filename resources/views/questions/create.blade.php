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
                        @include('layouts._form', ["buttonText" => "Ask this question"] )
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
