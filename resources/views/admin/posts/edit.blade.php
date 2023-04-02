@extends('admin.layouts.blog')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Category - {{$post->title}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Tags</a></li>
                            <li class="breadcrumb-item active">Edit {{$post->title}}</li>
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

                        <form action="{{route('admin.posts.update', $post->id)}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label >Title</label>
                                <input type="text" class="form-control mb-3" placeholder="Type title" name="title" value="{{$post->title}}">
                                @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea id="summernote" name="content">{{$post->content}}</textarea>
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
                                        @error('preview_image')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="image_preview w-50 mb-2 mt-2">
                                    <img class="w-50" src="{{asset('uploads/'.$post->preview_image)}}" alt="{{$post->title}}">
                                </div>
                            </div>

                            <div class="form-group w-50">
                                <label for="exampleInputFile">Main Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image" value="{{$post->preview_image}}">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        @error('main_image')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="preview_image w-50 mb-2 mt-2">
                                    <img class="w-50" src="{{asset('uploads/'.$post->main_image)}}" alt="{{$post->title}}">
                                </div>
                            </div>

                            <div class="form-group w-50">
                                <label for="exampleSelectRounded0">Category</label>
                                <select class="custom-select rounded-1" id="exampleSelectRounded0" name="category_id"

                                >
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{$category->id == $post->category_id ? 'selected' : ''}}
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
                                            {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : ''}}
                                        >
                                            {{$tag->title}}
                                        </option>
                                        {{$post->tags}}
                                    @endforeach
                                </select>
                                @error('tag_ids')
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
