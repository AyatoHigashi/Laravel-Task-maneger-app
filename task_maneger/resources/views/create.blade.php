@extends('layout')

@section('task-list')
<div>
    <div class="float-start">
        <h4 class="pb-3">Create Task</h4>
    </div>
    <div class="float-end">
        <a href="{{ route('index') }}" class="btn btn-info">
            All tasks
        </a>
    </div>
    <div class="clearfix"></div>
</div>

  <div class="card card-body bg-light p-4">
    <form action="{{ route('task.store')}}" method="POSt">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
          <select name="priority" id="priority" class="form-control">
            {{-- showing prioritys from the controller --}}
            @foreach ($prioritys as $priority)
              <option value="{{ $priority['value'] }}">{{ $priority['label'] }}</option>
            @endforeach
          </select>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control"type="text" class="form-control" rows="5" name="description" id="description" aria-describedby="emailHelp"> </textarea>
      </div>

      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-control">
          {{-- showing prioritys from the status --}}
          @foreach ($statuses as $status)
            <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
          @endforeach
        </select>
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

@endsection