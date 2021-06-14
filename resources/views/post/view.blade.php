@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header ">
                    পোস্ট অ্যাড করুন
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                    @if ($errors->all())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{ url('add/post/insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">

                            <input type="text" name="postTitle" value="{{old('postTitle')}}" class="form-control"
                                placeholder="পোস্ট এর টাইটেল">
                        </div>
                        <div class="form-group">

                            <input type="text" name="authorName" value="{{old('authorName')}}" class="form-control"
                                placeholder="লেখকের নাম লিখুন ">
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
                            <label>পোস্ট এর বর্ণনা</label>
                            <textarea name="postDescription" class="form-control"
                                rows="3">{{old('postDescription')}} </textarea>
                        </div>

                        <div class="form-group">
                            <label>পোস্ট এর ছবি বাছাই করুন </label>
                            <input type="file" name="postImage" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-info">অ্যাড করুন </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    All post
                </div>
                <div class="card-body">
                    @if (session('delete_status'))
                    <div class="alert alert-danger">
                        {{session('delete_status')}}
                    </div>
                    @endif
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>টাইটেল</th>
                                    {{-- <th>বর্ণনা</th> --}}
                                    <th>ছবি</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($posts as $post)
                                <tr>

                                    <td>{{ Str::limit($post->post_title,20) }}</td>
                                    {{-- <td>{{ App\Models\Category::find($post->category_id)->post_category }}</td>
                                    --}}
                                    {{-- <td>{{$post->relationCategory->post_category}}</td> --}}
                                    {{-- <td>{{ Str::limit($post->post_description,10) }}</td> --}}
                                    <td>
                                        <img src="{{ asset('uploads/postImages')}}/{{$post->post_image }}"
                                            alt="not found" width="150" class="img-fluid">
                                    </td>

                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{url('delete/post')}}/{{$post->id}}"
                                                class="btn btn-sm btn-danger">ডিলিট </a>
                                            <a href="{{url('edit/post')}}/{{$post->id}}"
                                                class="btn btn-sm btn-info">এডিট
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="7">No Data Available</td>
                                </tr>

                                @endforelse


                            </tbody>
                        </table>
                    </div>
                    {{ $posts ->links()}}
                </div>
            </div>

        </div>


    </div>
</div>
@endsection
