@extends('blog::layouts.master')

@section('content')

<div class="container">
            <div class="content">
                <section>
                    <div class="card">
                         <div class="card-header">
                            <h1>This is my task...</h1>
                        </div>
                        <div class="card-body">
                           <div class="container">
                            <form action="{{ route('task.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label m-3">Task</label>
                                    <div class="col-sm-1-12 m-3">
                                        <input type="text" class="form-control" name="task" placeholder="New Task">
                                        @error('task')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-7 m-3">
                                        <button type="submit" class="btn btn-primary">submit</button>
                                    </div>

                                    <div class="col-sm-1-12 m-3">
                                        <a href="" type="submit" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">Trash</a>
                                    </div>

                                </div>
                            </form>
                           </div>
                           {{-- MODAL START --}}
                           <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Trash Task</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Task</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($trashes as $trash)
                                                <tr>
                                                    <td>{{ $trash->task }}</td>
                                                    <td>
                                                        <a href="{{ route('restore', $trash->id) }}" class="btn btn-info">Restore</a>

                                                        <a href="{{ route('forcedelete', $trash->id) }}" class="btn btn-outline-danger">Delete</a>

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('all.restore') }}" class="btn btn-success">Restore all</a>
                                        <a href="{{ route('forcedelete_all') }}" class="btn btn-danger float-end">Delete all</a>
                                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                            {{-- MODAL END --}}
                           <table class="table">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->task }}</td>
                                        <td>{{ $task->created_at }}</td>
                                        <td>
                                            <div class="dropdown open">

                                                <button class="btn btn-success dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Status
                                                </button>
                                                @if ($task->status == 1)
                                                    <span class="btn-sm text-success">Active</span>
                                                @elseif ($task->status == 0)
                                                    <span class="btn-sm text-danger">Inactive</span>
                                                @elseif ($task->status == 2)
                                                    <span class="btn-sm text-info">Pending</span>
                                                @endif
                                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                                    <a href="{{ route('active.status', $task->id) }}" class="btn-success dropdown-item" >Active</a>
                                                    <a href="{{ route('inactive.status', $task->id) }}" class="dropdown-item btn-info"> Inactive</a>
                                                    <a href="{{ route('pending.status', $task->id) }}" class="dropdown-item btn-dark">Pending</a>
                                                    <a href="{{ route('task.delete', $task->id) }}" class="dropdown-item btn-danger">Delete</a>
                                                    <a href="{{ route('task.edit', $task->id) }}" class="dropdown-item btn-secondary">Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                           </table>
                        </div>
                        <div class="card-footer">
                            <h6>Design {{ date('Y')}}</h6>
                        </div>
                    </div>
                </section>

            </div>
        </div>





@endsection
