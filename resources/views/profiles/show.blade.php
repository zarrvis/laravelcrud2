@extends('layouts.default')



@section('content')

<div class="row">

		<section class="content">

			<div class="col-md-8 col-md-offset-2">


				<div class="panel panel-primary">
					<div class="panel-heading text-center">
				    		<h3 class="panel-title">{{$profiles->name}}</h3>
				 	</div>

					<div class="panel-body">


						<div class="table-container">

            <div class="form-group">
                <strong>Phone:</strong>
                {{ $profiles->phone }}
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                {{ $profiles->email }}
            </div>
            <div class="form-group">
                <strong>Address:</strong>
                {{ $profiles->address }}
            </div>


			    		 <div class="row">

							<div class="col-xs-12 col-sm-12 col-md-12">

								<a href="{{ route('profile.index') }}" class="btn btn-info btn-block" >Back</a>
							</div>

					     </div>

						</div>
					</div>

				</div>
			</div>
		</section>



@endsection
