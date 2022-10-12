@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Добавить категорию</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{route('admin.main.index')}}>Панель администратора</a></li>
            <li class="breadcrumb-item"><a href={{route('admin.category.index')}}>Категории</a></li>
            <li class="breadcrumb-item active">Добавить категорию</li>
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
            <form class="col-4" action="{{route('admin.category.store')}}" method="post">
                @csrf

                <div class="mb-3">
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Название категории" value="{{old('title')}}">
                </div>
                @error('title')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>

      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->
@endsection
