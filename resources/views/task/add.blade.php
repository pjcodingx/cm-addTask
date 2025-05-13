@extends('layouts.default')

@section('content')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card shadow-sm" style="max-width: 500px;">
            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0">Add New Task</h4>
            </div>
            <form class="p-3" method="POST" action="{{ route('task.add.post') }}">
                @csrf
                <div class="mb-3 fs-5"> 
                    <label for="title" class="form-label">Task Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="mb-3 fs-5">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input class="form-control" type="datetime-local" name="deadline" id="deadline" required>
                </div>

                <div class="mb-3 fs-5">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                </div>


                <!---session message for success and error---->

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Add Task</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                </div>


                
            </form>
        </div>
    </div>
</div>
@endsection