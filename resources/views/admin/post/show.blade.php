@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$post->title}} <a href="{{route('admin.post.edit', ['post' => $post->id])}}"><i class="text-success fas fa-pen"></i></a></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{route('admin.main.index')}}>Панель администратора</a></li>
            <li class="breadcrumb-item"><a href={{route('admin.post.index')}}>Посты</a></li>
            <li class="breadcrumb-item active">Просмотр поста</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
  <!-- /.content-header -->

  <!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
        <div class="row">
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Written {{$post->created_at->format('d-m-Y')}}</p>
        </div>
        <h5>Теги:
            @foreach ($post->tags as $tag)

                <a href="{{route('admin.tag.show', $tag->id)}}"><span class="badge badge-primary">{{$tag->title}}</span></a>

            @endforeach
        </h5>

        <h4>Категория: <a href="{{route('admin.category.show', $post->category->id)}}">{{$post->category->title}}</a></h4>
        <h4>Текст поста</h4>

        <div class="row ml-5">
            <div class="col-6 text-justify">
                {!!$post->content!!}
            </div>
        </div>

      <div class="row mt-3">
        <div class="col-2">
            <a href="{{route('admin.post.index')}}" class="btn btn-block btn-info">Назад к постам</a>
        </div>
        <div class="col-2 mr-3">

            <form action='{{route('admin.post.destroy', ['post' => $post->id])}}' method="post">
                @csrf
                @method('delete')

                <button type="submit" class="btn btn-danger">Удалить пост</button>
            </form>

        </div>



      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->
@endsection
