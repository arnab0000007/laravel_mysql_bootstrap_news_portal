@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header ">
                    বিস্তারিত অ্যাড করুন আমাদের সম্পর্কে
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
                    <form action="{{ url('add/about/insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="about">আমাদের সম্পর্কে</label>
                            <textarea name="about" class="form-control" rows="10">{{old('about')}} </textarea>
                        </div>
                        <div class="form-group">
                            <label for="ourWork">আমাদের কাজ</label>
                            <textarea name="ourWork" class="form-control" rows="10">{{old('ourWork')}} </textarea>
                        </div>
                        <div class="form-group">
                            <label for="help">সহযোগিতায় </label>
                            <textarea name="help" class="form-control" rows="10">{{old('help')}} </textarea>
                        </div>

                        <button type="submit" class="btn btn-info">অ্যাড করুন </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
