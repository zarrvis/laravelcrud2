@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

    <!-- Posts list -->
		 {{-- @if($videos->count()) --}}
    @if(!empty($profiles))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Profile List </h2>
                </div>

                <div class="pull-right">
									<form class="form-inline" action="{{ route('profile.index') }}" method="get">
										<div class="form-group">
											<input type="text" class="form-control" name="s" id="" placeholder="keyword" value = "{{ isset($s) ? $s : '' }}">
										</div>

										<div class="form-group">
											<button type="submit" class="btn btn-success">Search</button>
											<a class="btn btn-success" href="{{ route('profile.create') }}"> Add New</a>
										</div>
									</form>


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
												<th>Address</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td class="table-text">
                                <div>{{ ++$i }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$profile->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$profile->phone}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$profile->email}}</div>
                            </td>
														<td class="table-text">
                                <div>{{$profile->address}}</div>
                            </td>
                            <td>
                              <form action="{{action('ProfileController@destroy', $profile->id)}}" method="post">
                             {{csrf_field()}}
                                <a href="{{action('ProfileController@show', $profile->id)}}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a href="{{action('ProfileController@edit', $profile->id)}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></a>

  												     <input name="_method" type="hidden" value="DELETE">
  												     <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('are you sure?')"><span class="glyphicon glyphicon-trash"></span></button>
                             </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
								<div class="text-center">
									{{-- {!! $profiles->render() !!} --}}
										{{-- {!! $videos->links() !!} --}}
										{{ $profiles->appends(['s' => $s])->links() }}
								</div>
            </div>
        </div>
			@else
					<tr>
				 <td colspan="5">No Records found !!</td>
				 </tr>
    @endif
    </div>
</div>

@endsection
