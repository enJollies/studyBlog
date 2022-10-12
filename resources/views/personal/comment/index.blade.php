@extends('layouts.personal')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Комментарии</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{route('personal.main.index')}}>Личный кабинет</a></li>
            <li class="breadcrumb-item active">Комментарии</li>
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

      </div>
      <div class="row">
        <table class="table col-6">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Текст комментария</th>
                <th scope="col">ID поста</th>
                <th scope="col">Заголовок поста</th>
                <th scope="col" colspan="3" class="text-center">Действия</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <th scope="row">{{$comment->id}}</th>
                        <td>{{Str::limit($comment->message, 30)}}</td>
                        <td>{{$comment->post->id}}</td>
                        <td><p>{{$comment->post->title}}</p></td>
                        <td class="text-center"><a href="{{route('personal.comment.edit', ['comment' => $comment->id])}}"><i class="text-success fas fa-pen"></i></a></td>

                        <td class="text-center">

                            <form action='{{route('personal.comment.destroy', ['comment' => $comment->id])}}' method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn"><i class="text-danger fas fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->
@endsection
