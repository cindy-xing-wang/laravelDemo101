@extends('admin.layouts.master')

@section('content')
    
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Edit The Task</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message')}}
            </div>
            
        @endif

    <div class="card">
        <div class="card-body">
            <form class="forms-sample" enctype="multipart/form-data" action="{{ route('checklists.update', $checklist->id)}} " method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="exampleInputName1">Task</label>
                        <input type="text" class="form-control @error('task') is-invalid @enderror" id="exampleInputName1" placeholder="task" name="task" value="{{ $checklist->name}} ">
                        @error('task')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{route('checklists.index')}}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection