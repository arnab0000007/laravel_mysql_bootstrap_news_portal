@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header text-center">
                    উত্তর দেয়া হয়েছে
                </div>
                <div class="card-body">
                    @if (session('delete_status'))
                    <div class="alert alert-danger">
                        {{session('delete_status')}}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>প্রশ্ন</th>
                                        <th>উত্তর</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($answerdQuestions as $question)
                                    <tr>
                                        <td>{{ Str::limit($question->question,60) }}</td>
                                        <td>{{ Str::limit($question->answer,60) }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{url('delete/question')}}/{{$question->id}}"
                                                    class="btn btn-sm btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="6">কোনো প্রশ্ন নেই</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </table>
                      </div>

                    <div class="pagination text-center">
                        {{ $answerdQuestions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
