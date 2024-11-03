@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать продукт</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
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
                <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <input type="text" value="{{old('title') ?? $product->title}}" name="title" class="form-control"
                               placeholder="Наименование">
                    </div>

                    <div class="form-group">
                        <input type="text" value="{{old('description') ?? $product->description}}" name="description"
                               class="form-control" placeholder="Описание">
                    </div>

                    <div class="form-group">
                        <textarea name="content" cols="30" rows="10" class="form-control" placeholder="Контент">{{old('content') ?? $product->content}}</textarea>
                    </div>

                    <div class="form-group">
                        <input type="text" value="{{old('price') ?? $product->price}}" name="price" class="form-control"
                               placeholder="Цена">
                    </div>

                    <div class="form-group">
                        <input type="text" value="{{old('count') ?? $product->count}}" name="count" class="form-control"
                               placeholder="Количество">
                    </div>

                    <div class="form-group">
                        <div class="w-50">
                            <img src="{{asset('storage/' . $product->preview_image)}}" alt="preview_image" class="w-50 mb-3">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файд</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Выберите категорию</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Выберите группу</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            @foreach($groups as $group)
                                <option value="{{$group->id}}" {{$group->id == old('category_id') ? 'selected' : ''}}>{{$group->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите тег"
                                style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}" {{is_array($product->tags->pluck('id')->toArray()) && in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'selected' : ''}}>{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Выберите цвет"
                                style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{$color->id}}" {{is_array($product->colors->pluck('id')->toArray()) && in_array($tag->id, $product->colors->pluck('id')->toArray()) ? 'selected' : ''}}>{{$color->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
