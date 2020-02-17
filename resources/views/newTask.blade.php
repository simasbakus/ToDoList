@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add new Task</h1>

            <form class="" action="/task" method="post">
              <div class="form-group d-flex flex-column">
                <label for="task">What To Do?</label>
                <textarea name="task" rows="4" cols="80">{{ old('task') }}</textarea>
                <div>
                  {{ $errors->first('task') }}
                </div>
              </div>
              <button type="sumbit" name="addTask" class="btn btn-primary">Add Task</button>

              @csrf
            </form>

        </div>
    </div>
</div>
@endsection
