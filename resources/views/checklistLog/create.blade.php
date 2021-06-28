@extends('admin.layouts.master')

@section('content')
      
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Fill the checklist</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (Session::has('message'))
            <div class="alert alert-warning">
                {{Session::get('message')}}
            </div>
            @endif

    <div class="card">
        <div class="card-body">
            <form class="forms-sample" enctype="multipart/form-data" action="{{route('checklistLogs.store')}}" method="POST">
                @csrf
                @foreach ($data['tasks'] as $task)
                    <input type="checkbox" id="preStep" name={{$task->id}} value={{$task->id}}>
                    <label for=""> {{$task->name}}</label><br>
                @endforeach
                <br>
                <p></p>
                <div class="form-group">
                    <label for="exampleTextarea1">Log Note</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4"name="logNote">{{ old('logNote') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
