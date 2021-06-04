@extends('layout')

@section('task-list')

<div>
    <div class="float-start">
        <h4 class="pb-3">My Tasks</h4>
    </div>
    <div class="float-end">
        <a href="{{ route('task.create') }}" class="btn btn-info">
            <span class="badge bg-info text-dark">Add a New Task</span>
        </a>
    </div>
    <div class="clearfix"></div>
</div>

{{-- Display Tasks --}}
<div class="drag-item">
@foreach ($tasks as $task)

<div class="card mt-3">
  <div class="card-header">
      {{-- Condition for the tesk head --}}
    <div class="float-start">
    @if ($task->status === "Todo")  
        <h4>{{ $task->title }}</h4>
    @else
    <h4><del>{{ $task->title }}</del></h4>
    @endif

    {{-- Condition for how task priority will show --}}
    @if ($task->priority === "High")
    <span class="badge bg-primary text-dark">
        {{ $task->priority }}
     </span>
     @elseif ($task->priority === "Medium")
     <span class="badge bg-warning text-dark">
        {{ $task->priority }}
     </span>
     @elseif ($task->priority === "Low")
     <span class="badge bg-danger text-dark">
        {{ $task->priority }}
     </span>
     @else
         
    @endif
    </div>
    <div class="float-end">
        <div class="icon_div"></div>
        <div class="icon_div"></div>
        <div class="icon_div"></div>
    </div>
  </div>


  <div class="card-body">
    <div class="card-text">
        <div>
        <div class="float-start">
            {{-- Condition for description --}}
            @if ($task->status === "Todo")    
            {{ $task->description }}
            @else
            <del>{{ $task->description }}</del>
            @endif
            <br>
            {{-- Condition for status update --}}
            @if ($task->status === "Todo")  
            <span class="badge bg-info text-dark">Todo</span>

            @else
            <span class="badge bg-success text-dark">Done</span>
            @endif

            <small>
                Task added - {{ $task->created_at->diffForHumans() }}
            </small>
        </div>

        {{-- Ediut and Delete Button --}}
        <div class="float-end">
            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-success">
                Edit
            </a>
            <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
               <button class="btn btn-danger">
                   Delete
               </button>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>
  </div>
</div>  
@endforeach
</div>

{{-- Condition for empty task form --}}

@if (count($tasks) === 0)
    <div class="alert alert-danger p-2">
        No Tasks were found. Please Create a New Task
    </div>
@endif

@endsection