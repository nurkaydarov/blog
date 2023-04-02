@extends('layouts.blog')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @if($posts->count() > 0)
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{asset('uploads/'.$post->preview_image)}}" alt="{{$post->title}}">
                            </div>
                            <div>
                                <p class="blog-post-category">{{$post->categories->title}}</p>
                                @auth
                                    <form action="{{route('post.like.store', $post->id)}}" method="POST">
                                        @csrf
                                        <span>{{$post->liked_users_count}}</span>
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                            <button type="submit" class="bg-transparent border-0">
                                                <i class="fas fa-heart"></i>
                                            </button>

                                        @else
                                            <button type="submit" class="bg-transparent border-0">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        @endif
                                    </form>
                                @endauth
                                @guest()
                                    <span>{{$post->liked_users_count}}</span>
                                    <i class="far fa-heart"></i>
                                @endguest
                            </div>
                            <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </a>
                        </div>
                    @endforeach
                    @else
                        <h5>There are no posts in this category</h5>
                    @endif
                </div>
                <div class="row mx-auto" style="margin-top: -80px">
                    {{$posts->links()}}
                </div>
            </section>

        </div>

    </main>
@endsection
