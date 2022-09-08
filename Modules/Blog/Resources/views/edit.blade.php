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
                            <form action="{{ route('task.update', $task->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-1-12 col-form-label m-3">Task</label>
                                    <div class="col-sm-1-12 m-3">
                                        <input type="text" class="form-control" value="{{ $task->task }}" name="task" placeholder="New Task">
                                        @error('task')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-7 m-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                           </div>

                        </div>
                        <div class="card-footer">
                            <h6>Design {{ date('Y')}}</h6>
                        </div>
                    </div>
                </section>

            </div>
        </div>

@endsection
