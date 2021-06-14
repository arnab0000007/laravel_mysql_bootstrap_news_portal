@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header ">
                        Edit About Us
                    </div>
                    <div class="card-body">
                        @if (session('edit_status'))
                        <div class="alert alert-success">
                            {{session('edit_status')}}
                        </div>
                        @endif

                    <form action="{{ url('/edit/about/insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$about->id}}">
                        <div class="form-group">
                            <label for="about">আমাদের সম্পর্কে</label>
                            <textarea name="about"  class="form-control" rows="10">{{$about->about}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="ourWork">আমাদের কাজ</label>
                            <textarea name="ourWork"  class="form-control" rows="10">{{$about->our_work}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="help">সহযোগিতায়</label>
                            <textarea name="help"  class="form-control" rows="10">{{$about->help}}</textarea>
                        </div>

                        <div class="form-group">
                    <button type="submit" class="btn btn-warning"> এডিট করুন </button>
                        </div>
                        </div>
                          </form>
                    </div>
                </div>
         </div>
    </div>

@endsection
