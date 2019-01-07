{{ csrf_field() }}
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} ">
    <label for="question-title">Question Title.</label>
    <input type="text" name="title" id="title" value="{{ old('title', $question->title ) }}" placeholder="Enter Title" class="form-control ">
    @if ($errors->has('title'))
        <div class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </div>
    @endif
</div>
<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
    <label for="question-body">Explain your question.</label>
    <textarea  name="body" id="body" class="form-control" rows="10" >
        {{ old('body', $question->body ) }}
    </textarea>
    @if ($errors->has('body'))
        <div class="help-block">
            <strong>{{ $errors->first('body') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-lg">{{ $buttonText }}</button>
</div>