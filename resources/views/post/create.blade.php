@extends('layouts.app')
@section('title', '投稿作成フォーム｜')
@section('content')
<div class="container">
    <div class="row justify-content-center p-1">
        <div class="create-form col-md-8 col-md-offset-2 px-3 py-4 rounded">
          <h1 class="text-center fw-bold">The Creating Form</h1>
          <form action="{{ route('store')}}" method="POST" onSubmit="return checkSubmit()" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                  <label class="fs-3 fw-bold">国名</label>
                  <input type="text" class="form-control" placeholder="国名を入力して下さい" name="country">
                    @if ($errors->has('country'))
                      <div class="text-danger fs-5 fw-bold">
                        {{ $errors->first('country') }}
                      </div>
                    @endif
                </div>



                <div class="form-group my-3">
                    <label class="fs-3 fw-bold">旅行の内容</label>
                    <textarea class="form-control" rows="5" name="content" placeholder="旅行の内容を入力してください" ></textarea>
                    @if ($errors->has('content'))
                      <div class="text-danger fs-5 fw-bold">
                        {{ $errors->first('content') }}
                      </div>
                    @endif
                </div>


                <div class="form-group">
                    <label for="image"  class="fs-3 fw-bold">画像</label>
                    <input type="file" class="form-control" id="image" name="image" >
                    @if ($errors->has('image'))
                      <div class="text-danger fs-5 fw-bold">
                        {{ $errors->first('image') }}
                      </div>
                    @endif
                </div>


                <div class="pt-3">
                  <a class="btn btn-secondary" href="{{ route('home') }}"><i class="fa-solid fa-arrow-left-long"></i></a>
                  <button type="submit" class="btn btn-primary mx-2">作成</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function checkSubmit(){
    if(confirm('投稿する覚悟はあるか？')){
        return true;
    } else {
        return false;
        }
    }
</script>
@endsection