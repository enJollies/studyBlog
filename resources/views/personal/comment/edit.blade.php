@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Изменение комментария</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{route('personal.main.index')}}>Личный кабинет</a></li>
            <li class="breadcrumb-item"><a href={{route('personal.comment.index')}}>комментарии</a></li>
            <li class="breadcrumb-item active">Изменение комментария</li>
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
            <form class="col-4" action="{{route('personal.comment.update', $comment->id)}}" method="post">
                @csrf
                @method('patch')

                <div class="form-group">

                    <label for="summernote">Текст комментария</label>
                    <textarea class="form-control" id="summernote" name="message">{{$comment->message}}</textarea>
                </div>

                @error('message')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror


                <button type="submit" class="btn btn-primary mb-3">Сохранить изменения</button>
            </form>
        </div>

      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->
@endsection
