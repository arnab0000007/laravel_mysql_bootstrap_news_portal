@extends('layouts.frontendapp')
@section('frontend_content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header text-center">
                    আমাদের সম্পর্কে
                </div>
                <div class="card-body">
                    @if ($about != null)
                    <p class="text-center text-dark"> {{ $about->about}}</p>
                    @else
                    <p class="text-muted text-center"> About Us Will Be Here</p>
                    @endif
                </div>
            </div>
            <div class="card mt-4 mb-4">
                <div class="card-header text-center">
                    আমাদের কাজ
                </div>
                <div class="card-body">
                    @if ($about != null)
                    <p class="text-center text-dark"> {{ $about->our_work}}</p>
                    @else
                    <p class="text-muted text-center"> Our Work Will Be Here</p>
                    @endif
                </div>
            </div>

            <div class="card mt-4 mb-4">
                <div class="card-header text-center">
                    সহযোগিতায়
                </div>
                <div class="card-body">
                    @if ($about != null)
                    <p class="text-center text-dark"> {{ $about->help}}</p>
                    @else
                    <p class="text-muted text-center">  In collaboration will Be Here</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
