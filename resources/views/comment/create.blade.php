@extends('layouts.app')
@section('title', 'コメント作成フォーム｜')
@section('content')
<div class="p-1">
  <div class="col-md-8 col-md-offset-2 m-auto bg-white px-3 py-4 rounded">
    <h1 class="text-center fw-bold">The Comment Form</h1>
    <form method="POST" action="{{ route('comment.store') }}" onSubmit="return checkSubmit()">
      @csrf
            <div class="form-group">
                <label for="comment" class="fs-3 fw-bold">
                    コメント
                </label>
                <textarea id="comment" name="comment" class="form-control" rows="4" placeholder="140文字以下でコメントを入力して下さい！ ＊誹謗中傷のような言葉は禁止です。"></textarea>
                @if ($errors->has('comment'))
                      <div class="text-danger fs-5 fw-bold">
                        {{ $errors->first('comment') }}
                      </div>
                @endif
            </div>
            <div class="mt-3">
              <input type="hidden" name="user_id" value="{{ Auth::id() }}">
              <input type="hidden" name="post_id" value="{{ $post_id }}">
                <a class="btn btn-secondary" href="{{ route('home') }}"><i class="fa-solid fa-arrow-left-long"></i></a>
                <button type="submit" class="btn btn-dark mx-2">
                    送信
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function checkSubmit(){
      if(confirm('コメントを送信する覚悟はあるか？')){
        return true;
      } else {
        return false;
        }
      }
</script>
@endsection