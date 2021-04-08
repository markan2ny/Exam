@extends('layouts.app')
@section('content')
    
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{  session()->get('message') }}
        </div>
    @endif

    <div class="task-container mb-5">
        <a href="{{ route('create') }}" class="btn btn-primary" >Create new task</a>
    </div>

        @forelse ($tasks as $task)


            <div class="alert alert-light custom-card" role="alert">
                <input type="checkbox" class="d-inline-block mr-2" disabled {{ $task->status !== 0 ? 'checked' : ''  }}>  
                @if ($task->status == 0)
                    <span style="font-size: 20px;" class="d-inline-block text-dark">{{ $task->title }}</span>
                @else
                    <span style="font-size: 20px;" class="d-inline-block text-dark"><s>{{ $task->title }}</s></span>
                @endif

                <div class="custom-flex">

                    {{-- Remark --}}
                    <form action="{{ route('remark', $task->id) }}" method="post" class="d-inline-block space">
                        @csrf
                        @method('patch')

                        @if ($task->status == 0)
                            <button class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                        @else
                            <button class="btn btn-sm btn-warning"><i class="fas fa-retweet"></i></button>
                        @endif

                    </form>

                    {{-- Update --}}
                    <div class="d-inline-block ml-1">
                        <a href="{{ route('edit', $task->id) }}" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></a>
                    </div>

                    {{-- Delete --}}
                    <form action="{{ route('remark', $task->id) }}" method="post" class="d-inline-block ml-1">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>

                </div>
                
                <br>
                <small>Due date: {{ Carbon\Carbon::parse($task->date)->format('M d, Y h:i:s a')}} | Author: {{ $task->user->name }} | {{ $task->created_at->diffForHumans() }}</small> 
              
            </div>
                   
        @empty
            <h1 class="text-muted mt-5 text-center d-block w-100">NO TASK</h1>
        @endforelse
        
    
   




@endsection