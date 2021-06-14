@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header text-center">
                    উত্তর দেয়া হয়নি
                </div>
                <div class="card-body">
                    @if (session('delete_status'))
                    <div class="alert alert-danger">
                        {{session('delete_status')}}
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{session('status')}}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th>প্রশ্নদাতার নাম </th> --}}
                                    <th>প্রশ্ন </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($notanswerdQuestions as $question)
                                <tr>
                                    {{-- <td>{{$question->name}}</td> --}}
                                    <td>{{ Str::limit($question->question,70) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{url('delete/question')}}/{{$question->id}}"
                                                class="btn btn-sm btn-danger">Delete</a>
                                            <a href="{{url('answer/question')}}/{{$question->id}}"
                                                class="btn btn-sm btn-success">Answer</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center btn-info">
                                    <td colspan="3">নতুন কোনো প্রশ্ন নেই </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                      </div>

                    {{ $notanswerdQuestions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
