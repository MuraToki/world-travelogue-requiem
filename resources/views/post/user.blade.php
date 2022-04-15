@extends('layouts.app')
@section('title', 'ユーザーの投稿一覧｜')
@section('content')

<div class="mb-4">
    <p class="header-name text-center ">
       <span class="rounded p-2 fw-bold"> {{ $user->name }}'s Travelogue List</span>
    </p>
</div>


<div class="user-body">
    @foreach($user->posts as $post)
    <div class="user-main my-4 mx-2 p-2 rounded">
        <div class="user-title-image text-center">
            <div class="user-title m-auto">
 
                <p class="fw-bold text-light fs-3">『{{ $post->country }}』</p>
                <p class="fw-bold text-light fs-5">投稿日時：{{ $post->created_at }}</p>

            </div>

                <div class="user-image my-3 text-center">
                    <img src="{{ $post->image_path }}" alt="それぞれの画像" class="rounded" style="height: 220px; width: 313px;">
                </div>
        </div>


            <div class="text-center my-1">
                <a class="btn btn-danger" href="{{ route('home') }}"><i class="fa-solid fa-arrow-left-long"></i></a>
                <a href="{{ route('detail', $post->id) }}" class="btn btn-primary mx-2 fw-bold">詳細へ！</a>
            </div>   
    </div>
    @endforeach
</div>
        
@endsection