@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          
          <td>Title</td>
          <td>Task</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $tasks)
        <div> 
            <h1>{{$tasks->title}}</h1>
            <p>{{$tasks->body}}</p>
            <a href="{{ route('tasks.edit', $tasks->id)}}" class="btn btn-primary">Edit</a>
            <div>
                <form action="{{ route('tasks.destroy', $tasks->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </tbody>
  </table>
<div>
@endsection