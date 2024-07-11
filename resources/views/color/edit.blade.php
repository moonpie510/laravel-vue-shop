@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать цвет</h1>
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
                <form action="{{route('color.update', $color->id)}}" method="post">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label>Выберите цвет</label>
                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                            <input value="{{$color->title}}" type="text" class="form-control" name="title" data-original-title="" title="">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-square" style="color: {{$color->title}};"></i></span>
                            </div>
                        </div>
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
