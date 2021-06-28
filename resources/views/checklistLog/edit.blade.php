@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-calendar bg-blue"></i>
                <div class="d-inline">
                    <h5>Update Log Note</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
	<div class="col-lg-10">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
       
	<div class="card">
	<div class="card-body">
		<form class="forms-sample" action="{{route('checklistLogs.update',[$checklist->id])}}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
                    <div class="col-md-12">
                        <label><strong>Log Note</strong></label>
                        <textarea class="form-control @error('lognote') is-invalid @enderror" id="exampleTextarea1" rows="4" name="lognote">{{$checklist->lognote}}
                            </textarea>
                            @error('lognote')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="{{url('calendars')}}" class="btn btn-light">
                Cancel
            </a>


				</form>
			</div>
		</div>
	</div>
</div>


@endsection