@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Добавить пользователя</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{route('admin.main.index')}}>Панель администратора</a></li>
            <li class="breadcrumb-item"><a href={{route('admin.user.index')}}>Пользователи</a></li>
            <li class="breadcrumb-item active">Создание пользователя</li>
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
            <form class="col-4" action="{{route('admin.user.store')}}" method="post">
                @csrf

                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Имя пользователя" value="{{old('name')}}">
                </div>
                @error('name')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Электронная почта" value="{{old('email')}}">
                </div>
                @error('email')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror

                {{-- <div class="mb-3">
                    <input type="text" name="password" class="form-control" placeholder="Пароль" value="{{old('password')}}">
                </div>
                @error('password')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror --}}

                <div class="form-group">

                    <label for="role">Роль</label>
                    <select class="form-control" id="role" name="role_id">
                      @foreach ($roles as $id => $role)
                        <option value="{{$id}}" {{$id == old('role_id') ? 'selected' : ''}}>
                            {{$role}}
                        </option>
                      @endforeach
                    </select>

                </div>

                @error('role_id')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror

                <button type="submit" class="btn btn-primary">Добавить пользователя</button>
            </form>
        </div>

      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->
@endsection
