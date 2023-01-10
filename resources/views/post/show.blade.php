@extends('layouts.blog')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Written by Admin {{$post->getDateFromCarbon()}} {{$post->getCommentsCount->count()}} comments</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('uploads/'.$post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!!$post->content!!}
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4 mb-3" data-aos="fade-right">
                        <img src="{{asset('uploads/'.$post->preview_image)}}" alt="blog post" class="img-fluid">
                    </div>

                </div>

            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">

                    <section class="py-0">
                        @auth
                            <form action="{{route('post.like.store', $post->id)}}" method="POST">
                                @csrf
                                <span>{{$post->liked_users_count}}</span>
                                @if(auth()->user()->likedPosts->contains($post->id))
                                    <button type="submit" class="bg-transparent border-0">
                                        <i class="far fa-heart"></i>
                                    </button>

                                @else
                                    <button type="submit" class="bg-transparent border-0">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                @endif
                            </form>
                        @endauth
                        @guest()
                                <span>{{$post->liked_users_count}}</span>
                                <i class="fas fa-heart"></i>
                        @endguest
                    </section>
                    @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $post)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{asset('uploads/'.$post->preview_image)}}" alt="related post" class="post-thumbnail">
                                    <p class="post-category">{{$post->categories->title}}</p>
                                    <a href="{{route('post.show', $post->id)}}"><h5 class="post-title">{{$post->title}}</h5></a>
                                </div>
                            @endforeach


                        </div>
                    </section>
                    @endif
                    <section class="comment-list">
                        @if($post->comments->count() > 0)
                            <h2 class="section-title mb-5" data-aos="fade-up">Comments ({{$post->comments->count()}})</h2>
                            @foreach($post->comments as $comment)
                                <div class="comment-text">
                            <span class="username">
                                <div><b>{{$comment->user->name}}</b></div>
                            <span class="text-muted float-right">{{$comment->dateAsCarbon}}</span>
                            </span>
                                    {{$comment->message}}
                                </div>
                            @endforeach
                        @else
                            <h2 class="section-title mb-5" data-aos="fade-up">Comments not yet</h2>
                        @endif

                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5 mt-2" data-aos="fade-up">Leave a Reply</h2>
                        <form action="{{route('post.comment.store', $post->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
