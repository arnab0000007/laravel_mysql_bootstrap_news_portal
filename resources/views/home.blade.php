@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Welcome To Your Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{-- <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allUsers as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> --}}
                    <div class="row dashboard">

                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 pt-3 pb-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    <p class="font-weight-bold"> Posts</p>

                                </div>
                                <div class="card-body text-center bg-success font-weight-bold text-light">
                                    <h3> {{$totalPosts}}</h3>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 pt-3 pb-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    <p class="font-weight-bold"> Categories</p>

                                </div>
                                <div class="card-body text-center bg-danger font-weight-bold text-light">
                                   <h3>{{$totalCategry}}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 pt-3 pb-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    <p class="font-weight-bold"> Questions</p>


                                </div>
                                <div class="card-body text-center bg-info font-weight-bold text-light">
                                  <h3>{{$totalQuestion}}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 pt-3 pb-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    <p class="font-weight-bold"> Banners</p>

                                </div>
                                <div class="card-body text-center bg-primary font-weight-bold text-light">
                                 <h3>{{$totalBanners}}</h3>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
