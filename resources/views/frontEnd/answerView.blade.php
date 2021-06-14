@extends('layouts.frontendapp')
@section('frontend_content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto pt-5 pb-5">
            <div class="card">
                <div class="card-header text-center">
                    সকল প্রশ্নের উত্তর
                </div>
                <div class="card-body">
                    @forelse ($answerdQuestions as $question)
                    <div class="answer pb-4">
                        <p> প্রশ্নদাতার নাম : {{ $question->name }}</p>
                        <p style="color:rgb(46, 40, 40);font-weight: 600"> প্রশ্ন : {{ $question->question }}</p>
                        <p> উত্তর : {{ $question->answer }}</p>
                        <hr>
                    </div>
                    @empty
                    <p class="text-center text-muted">কোনো প্রশ্ন নেই</p>
                    @endforelse
                    <div class="pagination text-center">
                        {{ $answerdQuestions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
