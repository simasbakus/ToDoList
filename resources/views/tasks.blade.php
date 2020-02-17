@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <h1 class="row">To Do List</h1>
            <div class="row">
              <a href="/task/create" class="btn btn-primary col-12 my-3">Add New Task</a>
            </div>

            @foreach ($tasks as $task)
                  <form class="row my-3 custom-control custom-checkbox d-flex justify-content-center" action="/task/{{ $task->id }}/isDone" method="post">
                    @method('PATCH')
                    <input onclick="this.form.submit()" type="checkbox" class="custom-control-input col-1" id="customCheck{{ $task->id }}" {{ $task->isDone ? 'checked' : '' }}>

                    <label class="custom-control-label col-10" for="customCheck{{ $task->id }}">{{ $task->task }}</label>
                    <a href="/task/{{ $task->id }}/edit" class="col-1 btn btn-primary mr-1">Edit</a>
                    @csrf
                  </form>
            @endforeach

        </div>
    </div>
</div>
@endsection
