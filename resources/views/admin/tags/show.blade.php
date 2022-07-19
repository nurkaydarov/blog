@extends('admin.layouts.blog')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 mb-3">
                        <h1 class="m-0">{{$tag->title}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                @if(session()->has('success'))
                    <div class="alert alert-success mb-3">{{session()->get('success')}}</div>
                @endif
                <div class="row">
                    <div class="col-2">
                        <a href="{{route('admin.tags.create')}}" class="btn btn-block btn-primary">Add Tag</a>
                    </div>
                    <div class="col-12">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>

                                <tr>
                                    <td>ID<td>
                                    <td>{{$tag->id}}</td>

                                </tr>
                                <tr>
                                    <td>Название<td>
                                    <td>{{$tag->title}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
