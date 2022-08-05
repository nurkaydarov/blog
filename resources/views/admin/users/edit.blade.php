@extends('admin.layouts.blog')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit User - {{$user->name}}</h1>
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

                        <form action="{{route('admin.users.update', $user->id)}}" method="POST" class="w-25">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label >Username</label>
                                <input type="text" class="form-control mb-3" placeholder="Type Username" name="name" value="{{$user->name}}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Email</label>
                                <input type="email" class="form-control mb-3" placeholder="Type Email" name="email" value="{{$user->email}}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Password</label>
                                <input type="password" class="form-control mb-3" placeholder="Type Password" name="password">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Confirm Password</label>
                                <input type="password" class="form-control mb-3" placeholder="Type Password" name="password_confirmation">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label for="exampleSelectRounded0">Add Role</label>
                                <select class="custom-select rounded-1" id="exampleSelectRounded0" name="role"

                                >
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}"
                                            {{$id == $user->role ? 'selected' : ''}}
                                        >
                                            {{$role}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror

                            </div>

                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
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
