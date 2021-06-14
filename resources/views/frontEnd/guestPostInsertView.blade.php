@extends('layouts.frontendapp')
@section('frontend_content') 
@php
$categories = App\Models\Category::all();
@endphp
  <!-- Start Contact Us Area -->
  
        <section class="contact-area pb-40">
            <div class="container">
         
                <div class="row">
                    <div class="col-lg-8 col-md-12 m-auto">
                        <div class="contact-form">
                            <h3>আপনার লেখা আমাদের কাছে পাঠান </h3>
                           
                                
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
                        <form action="{{ url('add/guest/post/insert')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="row">
                            <div class="form-group col-lg-12">
                           
                           <input type="text" name="postTitle" value="{{old('postTitle')}}" class="form-control" placeholder="পোস্ট এর টাইটেল">
                           </div>
                             <div class="form-group col-lg-6">
                           
                           <input type="text" name="authorName" value="{{old('authorName')}}" class="form-control" placeholder="লেখকের নাম লিখুন ">
                           </div>
                           <div class="form-group col-lg-6">
                          
                
                           <select class="form-control" name="postCategory" id="category">
                            <option value="">ক্যাটাগরি বাছাই করুন  </option>
                             @foreach ($categories as $category)
                                  <option value="{{ $category->id}}">{{$category->post_category}}</option>
                             @endforeach

                          </select>
                           </div>

                           <div class="form-group col-lg-12">
                               <label>পোস্ট এর বর্ণনা</label>
                            <textarea name="postDescription"class="form-control" rows="3">{{old('postDescription')}} </textarea>
                          </div>

                           <div class="form-group col-lg-12">
                              
                           <input type="file" name="postImage" class="form-control">
                            {{-- <label>পোস্ট এর ছবি বাছাই করুন  </label> --}}
                          </div>
                          <div class="col-lg-12 form-group">
                              <button type="submit" class="btn btn-primary">পাঠান</button> 
                          </div>
                          
                       </div>
                       
                          </form> 
                            

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Contact Us Area -->
        @endsection