@extends('Dashboard.master')

@section('content')

<div class="row ml-4">
	<div class="col-12">
		<div class="form-group mt-3 mb-3 ">
			<x-btn.link-create route="question.create" ></x-btn.link-create>
		</div>
	</div>
</div>

<div class="row">
 <div class="col-12">
  <div class="card">
  	<div class="card-header background_color mx-1">
        All Question
	</div>
	
	<div class="card-body  p-1">
	@if(count($questions) > 0)
	  <div class="table-responsive ">
		<table id="example" class="table table-striped table-bordered mt-3" style="width:100%">
		  <thead class="table_header rounded">
			<tr>
				<th scope="col">Question</th>
				<th scope="col">Quize Name</th>
				<th scope="col">marks</th>
				<th scope="col">Date</th>
				<th scope="col"></th>
			</tr>
		  </thead>
		  <tbody>
		 @foreach($questions as $question)
		 <tr>
		   
			<td>{{ $question->question }}</td>
			<td>{{ $question->quize_name }}</td>
			<td>{{ $question->marks }}</td>
			<td>{{ $question->created_at }}</td>
			<td>
				<form action="{{ route('question.destroy', ['question' => $question->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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
		<x-alert.resource-empty resource="Question" new="question.create"></x-alert.resource-empty>
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