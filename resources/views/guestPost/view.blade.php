@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    All post
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
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
                                    <td>{{ Str::limit($post->post_title,25) }}</td>
                                    {{-- <td>{{ App\Models\Category::find($post->category_id)->post_category }}</td> --}}
                                    {{-- <td>{{$post->relationCategory->post_category}}</td> --}}
                                    {{-- <td>{{ Str::limit($post->post_description,20) }} ...</td> --}}
                                    <td>
                                        <img src="{{ asset('uploads/guestPostImages')}}/{{$post->post_image }}"
                                            alt="not found" width="150" class="img-fluid">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            {{-- <a href="{{url('delete/post')}}/{{$post->id}}" class="btn btn-sm
                                            btn-danger" >ডিলিট </a> --}}
                                            <a href="{{url('guest/post/edit')}}/{{$post->id}}"
                                                class="btn btn-sm btn-info">দেখুন </a>
                                        </div>

                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="7">নতুন কোনো লেখা নেই </td>
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
