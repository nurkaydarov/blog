@extends('admin.layouts.blog')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Tags</a></li>
                            <li class="breadcrumb-item active">Create post</li>
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

                        <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-25">
                                <label >Title</label>
                                <input type="text" class="form-control mb-3" placeholder="Type title" name="title" value="{{old('title')}}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea id="summernote" name="content" ></textarea>
                                @error('content')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label for="exampleInputFile">Preview Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                                    </div>
                                    @error('preview_image')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group w-50">
                                <label for="exampleInputFile">Main Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                                    </div>
                                    @error('main_image')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group w-50">
                                <label for="exampleSelectRounded0">Category</label>
                                <select class="custom-select rounded-1" id="exampleSelectRounded0" name="category_id"

                                >
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                {{$category->id == old('category_id') ? 'selected' : ''}}
                                        >
                                            {{$category->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Multiple</label>
                                <select class="select2" multiple="multiple" name='tag_ids[]' data-placeholder="Select Tags" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}"
                                        {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}}
                                        >
                                            {{$tag->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tag_ids')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Send">
                            </div>

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
