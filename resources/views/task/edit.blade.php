@extends('layouts.app')
@section('content')
    

<div class="row">
    <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12">
        <div class="card mt-5">
            <div class="card-header d-flex justify-content-between">
                <h5 class="d-inline-block">Edit Task - <b>{{ $task->title }}</b> </h5>
                <a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="card-body">
                <form action="{{ route('update', $task->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Task Name</label>
                        <input type="text" name="title" value="{{ $task->title }}" class="form-control" placeholder="Task Name">
                        @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Due date</label>
                        <input type="date" name="date" value="{{ $task->date }}" class="form-control">
                        @error('date')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button class="btn btn-success btn-block">Save Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection