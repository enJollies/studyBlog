@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Посты</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{route('admin.main.index')}}>Панель администратора</a></li>
            <li class="breadcrumb-item active">Посты</li>
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

        <div class="mb-3">

            <div>
                <a href="{{route('admin.post.create')}}" class="btn btn-block btn-primary">Добавить пост</a>
            </div>

            <div>
                <a href="{{route('admin.post.restore')}}" class="btn btn-block btn-warning">Восстановить все удаленные посты</a>
            </div>
        </div>





      </div>
      <div class="row">
        <table class="table col-6">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Название</th>
                <th scope="col">Категория</th>
                <th scope="col">Краткое содержание</th>
                <th scope="col" colspan="3" class="text-center">Действия</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->title}}</td>
                        <td><p>{{Str::limit(strip_tags($post->content), '30')}}</p></td>
                        <td class="text-center"><a href="{{route('admin.post.show', ['post' => $post->id])}}"><i class="far fa-eye"></i></a></td>
                        <td class="text-center"><a href="{{route('admin.post.edit', ['post' => $post->id])}}"><i class="text-success fas fa-pen"></i></a></td>

                        <td class="text-center">

                            <form action='{{route('admin.post.destroy', ['post' => $post->id])}}' method="post">
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
