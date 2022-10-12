@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Создание поста</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{route('admin.main.index')}}>Панель администратора</a></li>
            <li class="breadcrumb-item"><a href={{route('admin.post.index')}}>Посты</a></li>
            <li class="breadcrumb-item active">Создание поста</li>
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
            <form class="col-4" action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Заголовок поста" value="{{old('title')}}">
                </div>

                @error('title')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror

                <div class="form-group">

                    <label for="category">Категория</label>
                    <select class="form-control" id="category" name="category_id">
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>
                            {{$category->title}}
                        </option>
                      @endforeach
                    </select>

                </div>

                @error('category')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror

                <div class="form-group">

                    <label for="summernote">Текст поста</label>
                    <textarea class="form-control" id="summernote" name="content">{{old('content')}}</textarea>
                </div>

                @error('content')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror

                <div class="form-group">
                    <label for="mainImage">Выберите основное изображение</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="mainImage" name='main_image'>
                        <label class="custom-file-label" for="mainImage">Выберите файл</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Загрузить</span>
                      </div>
                    </div>
                </div>

                @error('main_image')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror

                <div class="form-group">
                    <label for="secondaryImage">Выберите изображение</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="secondaryImage" name='secondary_image'>
                        <label class="custom-file-label" for="secondaryImage">Выберите файл</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Загрузить</span>
                      </div>
                    </div>
                </div>

                @error('secondary_image')
                    <div class="text-danger mb-3">{{$message}}</div>
                @enderror

                <div class="form-group">
                    <label>Теги поста</label>
                    <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="tags[]">
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}" {{ is_array(old('tags')) && in_array($tag->id, old('tags')) ? 'selected' : '' }}>
                                {{$tag->title}}
                            </option>
                        @endforeach
                    </select>
                </div>

                @error('tags')
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
