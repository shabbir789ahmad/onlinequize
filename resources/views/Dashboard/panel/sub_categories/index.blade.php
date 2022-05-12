@extends('Dashboard.master')

@section('content')

<div class="row ml-4">
	<div class="col-12">
		<div class="form-group mt-3 mb-3 ">
			<x-btn.link-create route="sub_category.create" ></x-btn.link-create>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body pb-1">
				@if(count($sub_categories) > 0)
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead class="thead-light">
								<tr>
									<th scope="col">Category Logo</th>
									<th scope="col">Name</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								@foreach($sub_categories as $sub_category)
								<tr>
									<td class="col-2 text-center"><img src="{{asset('uploads/brand/' .$sub_category->sub_category_image)}}" class="rounded" width="50%" height="60rem"></td>
									<td class="col-8">{{ $sub_category->sub_category_name }}</td>
									<td>
										<a href="{{ route('sub_category.edit', ['sub_category' => $sub_category->id]) }}" type="submit" class="btn btn-xs btn-info">
											Edit
										</a>
										<form action="{{ route('sub_category.destroy', ['sub_category' => $sub_category->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
											@method('DELETE')
											@csrf
											<button type="submit" class="btn btn-xs btn-danger">
												Delete
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					<x-alert.resource-empty resource="sub_category" new="sub_category.create"></x-alert.resource-empty>
				@endif			
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')

@parent

<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
});
</script>
@endsection