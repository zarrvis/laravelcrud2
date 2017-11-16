@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        {{-- @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif --}}
        @if (count($errors) > 0)

			        <div class="alert alert-danger">

			            <strong>Whoops!</strong> There were some problems with your input.<br><br>

			            <ul>

			                @foreach ($errors->all() as $error)

			                    <li>{{ $error }}</li>

			                @endforeach

			            </ul>

			        </div>

			    @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Add a New Profile <a href="{{ route('profile.index') }}" class="btn btn-success btn-xs pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('profile.store') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Address</label>
                        <div class="col-sm-10">
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Add Profile" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
