@extends('Dashboard.master')

@section('content')

<div class="row ml-4">
	<div class="col-12">
		<div class="form-group mt-3 mb-3 ">
			<x-btn.link-create route="quiz.create" ></x-btn.link-create>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
		  <div class="card-header background_color">
             All Quizes
	      </div>
	<div class="card-body p-1">
	@if(count($quizes) > 0)
		<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead class="table_header">
				<tr>
					<th scope="col"> Image</th>
					<th scope="col">Quiz Name</th>
					<th scope="col">Date</th>
					<th scope="col">Start Time</th>
					<th scope="col">End Time</th>
					<th scope="col">Per Question Time</th>
					
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
			  @foreach($quizes as $quiz)
			   <tr>
				 <td class="col-2"><img src="{{asset('uploads/brand/' .$quiz['quize_images'])}}" width="100%" height="80rem"></td>
				  <td class="">{{ $quiz->quize_name}}
				  </td>
				  <td class="">{{ $quiz->start_date}}
				  </td>
				  <td class="">{{ $quiz->start_time}}
				  <td class="">{{ $quiz->end_time}}
				  <td class="">{{ $quiz->time_per_question}}
				  </td>
				  <td>
					<form action="{{ route('quiz.destroy', ['quiz' => $quiz->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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
					<x-alert.resource-empty resource="Quize" new="quiz.create"></x-alert.resource-empty>
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