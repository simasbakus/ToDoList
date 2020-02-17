@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Update Task</h1>

            <form class="" action="/task/{{ $task->id }}" method="post">
              @method('PATCH')
              <div class="form-group d-flex flex-column">
                <label for="task">What To Do?</label>
                <textarea name="task" rows="4" cols="80">{{ $task->task }}</textarea>
                <div>
                  {{ $errors->first('task') }}
                </div>
              </div>
              <button type="sumbit" name="addTask" class="btn btn-primary">Update Task</button>

              @csrf
            </form>

            <form class="mt-2" action="/task/{{ $task->id }}" method="post">
              @method('DELETE')
              @csrf
              <button type="submit" name="delete" class="btn btn-danger">Delete</button>
            </form>

        </div>
    </div>
</div>
@endsection
