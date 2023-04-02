@extends('layouts.blog')
@section('content')
    <main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="{{'uploads/'.$post->preview_image}}" alt="{{$post->title}}">
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
            </div>
            <div class="row mx-auto" style="margin-top: -80px">
                {{$posts->links()}}
            </div>
        </section>
        <div class="row">
            <div class="col-md-8">
                <section>
                    <div class="row blog-post-row">
                        @foreach($randomPosts as $post)
                            <div class="col-md-6 blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{'uploads/'.$post->preview_image}}" alt="blog post">
                                </div>

                                    <p class="blog-post-category">{{$post->categories->title}}</p>


                                <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{$post->title}}</h6>
                                </a>
                            </div>
                        @endforeach


                    </div>

                </section>
            </div>
            <div class="col-md-4 sidebar" data-aos="fade-left">
                <div class="widget widget-post-carousel">
                    <h5 class="widget-title">Post Lists</h5>
                    <div class="post-carousel">
                        <div id="carouselId" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($likedPosts as $post)

                                    @if($loop->first)
                                        <li data-target="#carouselId" data-slide-to="{{$loop->index}}" class="active"></li>
                                    @else
                                        <li data-target="#carouselId" data-slide-to="{{$loop->index}}" class=""></li>
                                    @endif

                                @endforeach
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @foreach($likedPosts as $post)
                                    @if($loop->first)
                                    <figure class="carousel-item active">
                                        <img src="{{'uploads/'.$post->preview_image}}" alt="First slide">
                                        <figcaption class="post-title">
                                            <a href="{{route('post.show', $post->id)}}">{{$post->title}}</a>
                                        </figcaption>
                                    </figure>
                                    @else
                                        <figure class="carousel-item">
                                            <img src="{{'uploads/'.$post->preview_image}}" alt="First slide">
                                            <figcaption class="post-title">
                                                <a href="{{route('post.show', $post->id)}}">{{$post->title}}</a>
                                            </figcaption>
                                        </figure>
                                    @endif
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget widget-post-list">
                    <h5 class="widget-title">Post List</h5>
                    <ul class="post-list">
                        @foreach($likedPosts as $post)
                            <li class="post">
                                <a href="{{route('post.show', $post->id)}}" class="post-permalink media">
                                    <img src="{{'uploads/'.$post->preview_image}}" alt="blog post">
                                    <div class="media-body">
                                        <h6 class="post-title">{{$post->title}}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach


                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widget-title">Categories</h5>
                    <img src="assets/images/blog_widget_categories.jpg" alt="categories" class="w-100">
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
