@extends('layouts.app')
@section('content')
<!-- Start Contact Us Area -->
<section class="contact-area pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 m-auto">
                <div class="contact-form">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="text-transform: capitalize">প্রশ্নদাতার নাম : {{$question->name}}</h4>
                            <h6> {{$question->created_at->format("F j, Y")}}</h6>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">প্রশ্নের বিষয় : {{$question->question_subject}}</h5>
                            <p class="card-text">প্রশ্ন : {{$question->question}}</p>
                        </div>
                    </div>
                    @if ($errors->all())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{url('question/answer/insert')}}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="questionId" value="{{$question->id}}">
                            <div class="col-lg-12 form-group pt-3">
                                <textarea placeholder="আপনার উত্তর বিস্তারিত ভাবে লিখুন :" name="answer" id="message"
                                    class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="col-lg-12 form-group">
                                <button type="submit" class="btn btn-primary">উত্তর সাবমিট করুন </button>
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
