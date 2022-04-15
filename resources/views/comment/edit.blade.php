@extends('layouts.app')
@section('title', 'コメント編集フォーム｜')
@section('content')
<div class="my-2 p-1">
    <div class="col-md-8 col-md-offset-2 m-auto bg-dark px-3 py-4 rounded">
        <h1 class="text-white text-center fw-bold">The Editing Form</h1>
        <form method="POST" action="{{ route('update', $comment->id) }}" onSubmit="return checkSubmit()">
          @csrf
          <input type="hidden" name="id" value="{{ $comment->id }}">

            <div class="form-group mt-2">
                <label for="comment" class="fs-3 fw-bold text-white">
                    コメント
                </label>
                <textarea id="comment" name="comment" class="form-control" rows="4" placeholder="編集する内容を書いてください">{{ $comment->comment }}</textarea>
                @if ($errors->has('comment'))
                    <div class="text-warning fw-bold">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
                
            </div>
            <div class="mt-3">
                <a class="btn btn-secondary" href="javascript:history.back()"><i class="fa-solid fa-arrow-left-long"></i></a>
                <button type="submit" class="btn btn-primary ms-2">
                    更新
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(confirm('更新してもいいかな？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection