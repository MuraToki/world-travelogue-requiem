@extends('layouts.app')
@section('title', '一覧画面｜')
@section('content')

<header class="head_list mt-4 mb-3">
    <div class="title">
        <h1 class="text-center fw-bold"><span id="span_title" class="bg-gradient bg-dark text-light p-2 rounded">~List of Travelogues~</span></h1>
    </div>
</header>

<!-- Error & Search Message -->
<div class="message m-auto">
@isset($search_result)
    <div class="err_style col-md-4 pt-1 rounded ">
        <p class="text-success fs-5 fw-bold">{{ $search_result }}</p>
    </div>
@endisset

@if (session('err_msg'))
    <div class="err_style col-md-4 pt-1 rounded">
        <p class="text-success fs-5 fw-bold">
            {{ session('err_msg') }}
        </p>
    </div>
    @endif
</div>



    @foreach($posts as $post)
    <div class="container">
        <div class="main-posts">
            <div class="main-post-table rounded my-3">
                <div class="main-left justify-content-around">
                    <div class="first-main-body ">
                        <p class="card-title my-3 fs-5 fw-bold text-center"><a href="{{ route('show', $post->user_id)}}" class="title-name text-decoration-none text-dark">{{ $post->user->name }}</a>
                        </p>
                        <h3 class="text-center text-break">『<span class="span-title  fw-bold">{{ $post->country }}</span>』</h3>
                    
                    </div>

                @if($post->users()->where('user_id', Auth::id())->exists())
                <div class="my-3">
                    <form action="{{ route('unfavorites', $post) }}" method="POST" onSubmit="return unlikeDlete()">
                        @csrf
                        <button type="submit" class="btn btn-danger rounded-pill"><i class="fa-solid fa-heart"></i>・{{ $post->users()->count() }}</button>
                    </form> 
                </div>
                @else
                <div class="my-3">
                    <form action="{{ route('favorites', $post) }}" method="POST" onSubmit="return likeSubmit()">
                        @csrf
                        <button type="submit" class="btn btn-primary rounded-pill"><i class="fa-solid fa-heart"></i>・{{ $post->users()->count() }}</button>
                    </form>
                </div>
                @endif

   
                <div class="detail-btn py-2 text-center">
                    <a href="{{ route('detail', $post->id)}}" class="btn text-decoration-none fw-bold">詳細へ！</a>
                </div>
            </div>

                <div class="main-right text-center">

                    <div class="text-center">
                        <img src="{{ $post->image_path }}" alt="それぞれの画像" class="rounded" style="height: 220px; width: 313px;">
                    </div>
                
                    <div class="text-dark fw-bold mt-2">
                        {{ $post->created_at }}
                    </div>  
                </div>
            </div>
    </div>
</div>
@endforeach

@if(isset($search_query))
    {{ $posts->appends(['search' => $search_query])->links('vendor.pagination.custom') }}
@else
    {{ $posts->links('vendor.pagination.custom') }} 
@endif

<script>
    function likeSubmit(){
        if(confirm('いいねを押す覚悟はあるか？')){
            return true;
        } else {
            return false;
            }
        }
    function unlikeDlete(){
        if(confirm('いいねを取り消す覚悟はあるか？')){
            return true;
        } else {
            return false;
            }
        } 
</script>
@endsection
