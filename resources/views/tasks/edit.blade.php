@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Task
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('tasks.update', $share->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="title">Task Title:</label>
          <input type="text" class="form-control" name="title" value={{ $tasks->title }}/>
        </div>
        <div class="form-group">
          <label for="body">Task Detail:</label>
          <textarea class="form-control" name="body" value={{ $tasks->body }}></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection