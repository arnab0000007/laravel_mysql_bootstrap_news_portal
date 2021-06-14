@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
               <div class="col-lg-4">
                   <div class="card">
                       <div class="card-header ">
                         ক্যাটাগরি অ্যাড করুন
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
                   <form action="{{ url('add/category/insert')}}" method="POST">
                       @csrf
                           <div class="form-group">
                           <input type="text" name="postCategory" value="{{old('postCategory')}}" class="form-control" placeholder="ক্যাটাগরি ">
                           </div>
                           <div class="form-group">

                           <input type="checkbox" name="menuStatus" id="menu" value="1"> <label for="menu">মেনু হিসেবে ব্যবহার করবো </label>
                           </div>
                            <button type="submit" class="btn btn-info">Add</button>
                          </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        সকল  ক্যাটাগরি
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

                                    <th>ক্যাটাগরি</th>

                                    <th>মেনু </th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                    <tr>
                                        <td>{{$category->post_category}}</td>

                                        <td>{{ ($category->menu_status == 1 ) ? "yes":"no"}}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{url('delete/category')}}/{{$category->id}}" class="btn btn-sm btn-danger" >Delete</a>
                                                 <a href="{{url('change/menu/status')}}/{{$category->id}}" class="btn btn-sm btn-info" >change</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="4">No Data Available</td>
                                        </tr>

                                    @endforelse

                                </tbody>
                              </table>
                          </div>

                          {{ $categories ->links()}}
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
