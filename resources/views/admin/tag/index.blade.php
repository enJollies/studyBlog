@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Теги</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{route('admin.main.index')}}>Панель администратора</a></li>
            <li class="breadcrumb-item active">Теги</li>
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
                <a href="{{route('admin.tag.create')}}" class="btn btn-block btn-primary">Добавить тег</a>
            </div>

            <div>
                <a href="{{route('admin.tag.restore')}}" class="btn btn-block btn-warning">Восстановить все удаленные теги</a>
            </div>
        </div>





      </div>
      <div class="row">
        <table class="table col-6">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Название</th>
                <th scope="col" colspan="3" class="text-center">Действия</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->title}}</td>
                        <td class="text-center"><a href="{{route('admin.tag.show', ['tag' => $tag->id])}}"><i class="far fa-eye"></i></a></td>
                        <td class="text-center"><a href="{{route('admin.tag.edit', ['tag' => $tag->id])}}"><i class="text-success fas fa-pen"></i></a></td>

                        <td class="text-center">

                            <form action='{{route('admin.tag.destroy', ['tag' => $tag->id])}}' method="post">
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
