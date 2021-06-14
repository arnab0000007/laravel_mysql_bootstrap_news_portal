@extends('layouts.frontendapp')
@section('frontend_content') 
  <!-- Start Contact Us Area -->
        <section class="contact-area pb-40">
            <div class="container">
         
                <div class="row">
                    <div class="col-lg-8 col-md-12 m-auto">
                        <div class="contact-form">
                            <h3>প্রশ্ন করুন</h3>
                           
                                
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
                            <form action="{{url('question/insert')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                         <input type="text" value="{{old('name')}}" name="name" class="form-control" id="name" placeholder="আপনার নাম প্রদান করুন">
                                    </div>
                                      <div class="col-lg-4 form-group">
                                         <input type="email" value="{{old('email')}}" class="form-control" name="email" id="email" placeholder="আপনার ইমেইল প্রদান করুন" >
                                    </div>
                                      <div class="col-lg-4 form-group">
                                         <input type="text" value="{{old('question_subject')}}" class="form-control" name="question_subject" id="msg_subject" placeholder="আপনার প্রশ্নের বিষয় প্রদান করুন">
                                    </div>
                                      <div class="col-lg-12 form-group">
                                         <textarea placeholder="আপনার প্রশ্নটি বিস্তারিত ভাবে লিখুন " value="{{old('question')}}" name="question" id="message" class="form-control" cols="30" rows="10"></textarea>     
                                    </div>
                                    <div class="col-lg-12 form-group">
                                    <button type="submit" class="btn btn-primary">প্রশ্নটি পাঠান </button>
                                   
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