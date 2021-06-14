@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{url('add/post/view')}}">Post list</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$singlePostInfo->post_title}}</li>
                </ol>
            </nav>


            <div class="card">
                <div class="card-header ">
                    Edit Post Form
                </div>

                <div class="card-body">
                    @if (session('edit_status'))
                    <div class="alert alert-success">
                        {{session('edit_status')}}
                    </div>
                    @endif
                    @if ($errors->all())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                    @endif

                    <form action="{{ url('/edit/post/insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">

                            <input type="hidden" name="postId" value="{{$singlePostInfo->id}}">
                            <label for="postTitle">পোস্ট এর টাইটেল</label>
                            <input type="text" name="postTitle" value="{{$singlePostInfo->post_title}}"
                                class="form-control" placeholder="পোস্ট এর টাইটেল">
                        </div>

                        <div class="form-group">
                            <label for="authorName">লেখকের নাম</label>
                            <input type="text" name="authorName" value="{{$singlePostInfo->author_name}}"
                                class="form-control" placeholder="লেখকের নাম লিখুন">
                        </div>


                        <div class="form-group">

                            <select class="form-control" name="postCategory" id="category">
                                <option value="">ক্যাটাগরি বাছাই করুন </option>

                                @foreach ($categories as $category)
                                <option value="{{ $category->id}}">{{$category->post_category}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="postDescription">পোস্ট এর বর্ণনা </label>
                            <textarea name="postDescription" class="form-control"
                                rows="5">{{$singlePostInfo->post_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>পোস্ট এর ছবি বাছাই করুন </label>
                            <input type="file" name="postImage" class="form-control">
                            <img src="{{ asset('uploads/postImages')}}/{{$singlePostInfo->post_image }}"
                                alt="image not found" width="200">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">পোস্ট এডিট করুন </button>
                        </div>
                </div>


                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
