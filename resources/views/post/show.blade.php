@extends('layouts.main')
@section('content')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$publicationDate->translatedFormat('d F Y')}} • {{$publicationDate->format('H:i')}} </p>
        <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
            <img src={{asset('storage/'.$post->main_image)}} alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    {!! $post->content!!}
                </div>
            </div>

        </section>

        <div class="col-md-12">
            <div>

                @auth()
                    <form action={{route('post.like.store', $post->id)}} method="post">
                        @csrf
                        <button class="border-0 bg-transparent" type="submit">

                            @if($post->likedUsers->contains(auth()->user()))
                                <i class="fas fa-heart"></i>
                            @else
                                <i class="far fa-heart"></i>
                            @endif

                        </button>
                    </form>
                @endauth

                @guest
                    <div>
                        <i class="far fa-heart"></i>
                    </div>
                @endguest

                <p class="blog-post-category">{{$post->liked_users_count}}</p>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-9 mx-auto">
                @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                        <div class="row">

                            @foreach ($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src={{asset('storage/'.$relatedPost->main_image)}} alt="related post" class="post-thumbnail">
                                    <h5 class="post-title"><a class="blog-post-permalink" href={{route('post.show', $relatedPost->id)}}>{{$relatedPost->title}}</a></h5>
                                </div>
                            @endforeach

                        </div>
                    </section>
                @endif
                <section class="comment-section">


                    <h2 class="section-title mb-5" data-aos="fade-up">Комментарии ({{$post->comments->count()}})</h2>
                    @foreach ($post->comments as $comment)


                        <div class="comment-text">
                            <div><span class="username">{{$comment->user->name}}</span><!-- /.username --></div>

                            <span class="text-muted float-right">{{$comment->createdAtInCarbon->diffForHumans()}}</span>

                            {{$comment->message}}
                        </div>

                    @endforeach



                    @auth
                        <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>

                        <form action={{route('post.comment.store', $post->id)}} method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Комментарий</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Оставьте комментарий" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Оставить комментарий" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    @endauth

                </section>
            </div>
        </div>
    </div>
</main>
@endsection
