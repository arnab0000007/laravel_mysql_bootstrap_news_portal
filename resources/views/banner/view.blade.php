 @extends('layouts.app')
 @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> অ্যাড ব্যানার </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                        @endif
                    <form action="{{ url('add/banner/insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                             <div class="form-group">
                                 <label>Select Your Banner </label>
                                <input type="file" name="bannerImage" class="form-control">
                              </div>
                              <div class="form-group">
                    <button type="submit" class="btn btn-warning">upload </button>
                              </div>
                          </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
         <div class="card">
            <div class="card-header">
               All Banner image
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
                          <th>Pic</th>
                          <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                       @forelse ($banners as $banner)
                       <tr>
                          <td >
                             <img src="{{ asset('uploads/bannerImages')}}/{{$banner->banner_image }}" alt="not found" width="300" class="img-fluid">
                          </td>
                          <td>
                             <div class="btn-group" role="group">
                                <a href="{{url('delete/banner')}}/{{$banner->id}}" class="btn btn-sm btn-danger" >Delete </a>
                             </div>
                          </td>
                       </tr>
                       @empty
                       <tr class="text-center">
                          <td colspan="2">No Data Available</td>
                       </tr>
                       @endforelse
                    </tbody>
                 </table>
              </div>

            </div>
         </div>
      </div>
        </div>
    </div>
 @endsection
