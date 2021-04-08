@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>{{ $task->title }}</h3>
                    <div>
                        <a href="{{ route('edit', $task->id) }}"  title="Edit" class="text-success custom-size"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('delete', $task->id) }}" style="display: inline-block;" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="text-danger custom size" title="Delete" style="outline:none; border:none;" ><i class="fas fa-trash"></i></button>
                        </form>
                        <a href="{{ route('home') }}" title="Back" class=" custom-size"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                      @if ($task->description) 
                        
                        <p class="custom-padding">{{ $task->description }}</p>
                          
                      @else
                        <p class="custom-padding h3 text-center">NO DESCRIPTION</p>
                      @endif
                    </div>
                    <span class="text-muted">{{ Carbon\Carbon::parse($task->date)->format('M d, Y')}}</span> | 
                    <span class="text-muted">{{ $task->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </div>

    
@endsection