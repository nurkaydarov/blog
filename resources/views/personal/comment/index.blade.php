@extends('personal.layouts.blog')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Liked Posts</h1>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card-body table-responsive p-0">
                            @if(count($comments))
                                <h5>{{$comments}}</h5>
                                @if(session()->has('success'))
                                    <div class="alert alert-success mb-3">{{session()->get('success')}}</div>
                                @endif
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{$comment->id}}</td>
                                            <td>{{$comment->message}}</td>
                                            <td>
                                                <a href="{{route('personal.comments.edit', $comment->id)}}" class="text-success btn btn-app"><i class="fas fa-edit"></i></a>

                                                <form action="{{route('personal.comments.delete', $comment->id)}}" method="POST" class=" btn ">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit"  class="btn-app text-danger"><i class="fas fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            @else
                                There are no liked comments yet
                            @endif
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
