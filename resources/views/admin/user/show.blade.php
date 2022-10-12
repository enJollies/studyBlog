@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Данные пользователя</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{route('admin.main.index')}}>Панель администратора</a></li>
            <li class="breadcrumb-item"><a href={{route('admin.user.index')}}>Пользователи</a></li>
            <li class="breadcrumb-item active">Просмотр пользователя</li>
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
            <p>{{$user->title}} <a href="{{route('admin.user.edit', ['user' => $user->id])}}"><i class="text-success fas fa-pen"></i></a></p>
        </div>

      </div>
      <div class="row">
        <table class="table col-6">
            <tbody>

                <tr>
                    <th scope="row">ID</th>
                    <td>{{$user->id}}</td>
                </tr>

                <tr>
                    <th scope="row">Имя пользователя</th>
                    <td>{{$user->name}}</td>
                </tr>
            </tbody>
        </table>
      </div>

      <div class="row mt-3">
        <div class="col-2">
            <a href="{{route('admin.user.index')}}" class="btn btn-block btn-info">Назад к пользователям</a>
        </div>
        <div class="col-2 mr-3">

            <form action='{{route('admin.user.destroy', ['user' => $user->id])}}' method="post">
                @csrf
                @method('delete')

                <button type="submit" class="btn btn-danger">Удалить пользователя</button>
            </form>

        </div>



      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->
@endsection
