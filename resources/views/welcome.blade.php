@extends('layouts.default')

<!---content TASK dashboard--->

@section('content')


<div class="container mt-4" style="max-width: 800px">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-success mb-0 ">My Tasks by <span style="color: #355E3B">{{Auth::user()->name}}</span></h2>
        
        <a href="{{ route('task.add') }}" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><path d="M12 5v14M5 12h14"/></svg>
            Add New Task 
        </a>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @foreach($tasks as $task)
        <div class="card shadow-sm mb-3 border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-success me-3"><path d="M5 12l14 0"/><path d="M13 18l6 -6"/><path d="M13 6l6 6"/></svg>
                        <div>
                            <h5 class="card-title mb-1">{{$task->title}}</h5>
                            <p class="text-muted small mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-1"><path d="M12 8v4l3 3"/><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/></svg>
                                {{$task->deadline}}
                            </p>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('task.status.update',$task->id) }}" class="btn btn-outline-success btn-sm" title="Mark as Complete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95"/><path d="M3.69 8.56a9 9 0 0 0 -.69 3.44"/><path d="M3.69 15.44a9 9 0 0 0 1.95 2.92"/><path d="M8.56 20.31a9 9 0 0 0 3.44 .69"/><path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95"/><path d="M20.31 15.44a9 9 0 0 0 .69 -3.44"/><path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92"/><path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69"/><path d="M9 12l2 2l4 -4"/></svg>
                        </a>
                        <a href="{{route('task.delete', $task->id)}}" class="btn btn-outline-danger btn-sm" title="Delete Task">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7l16 0"/><path d="M10 11l0 6"/><path d="M14 11l0 6"/><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/></svg>
                        </a>
                    </div>
                </div>
                <p class="card-text mt-3 mb-0">{{$task->description}}</p>
            </div>
        </div>
    @endforeach

    @if($tasks->isEmpty())
        <div class="text-center py-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-muted mb-3"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            <h4 class="text-muted">No tasks yet</h4>
            <p class="text-muted">Add your first task to get started!</p>
        </div>
    @endif

    <div class="d-flex justify-content-center mt-4">
        {{ $tasks->links() }}
    </div>
</div>
@endsection