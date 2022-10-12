@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Обновить тег</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{route('admin.main.index')}}>Панель администратора</a></li>
            <li class="breadcrumb-item"><a href={{route('admin.tag.index')}}>Теги</a></li>
            <li class="breadcrumb-item active">Изменение тега</li>
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
        <div class="col-12">
            <form class="col-4" action="{{route('admin.tag.update', ['tag' => $tag->id])}}" method="post">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Название тега" value="{{$tag->title}}">
                </div>
                @error('title')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror

                <button type="submit" class="btn btn-success">Обновить</button>
            </form>
        </div>

      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->
@endsection
