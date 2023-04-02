@extends('admin.layouts.blog')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 mb-3">
                        <h1 class="m-0">Posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Posts</li>
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
                        <a href="{{route('admin.posts.create')}}" class="btn btn-block btn-primary">Add Post</a>
                    </div>
                    <div class="col-12">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>
                                            <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-app"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('admin.posts.edit', $post->id)}}" class="text-success btn btn-app"><i class="fas fa-edit"></i></a>
                                            <form action="{{route('admin.posts.delete', $post->id)}}" method="POST" class=" btn ">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit"  class="btn-app text-danger"><i class="fas fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
