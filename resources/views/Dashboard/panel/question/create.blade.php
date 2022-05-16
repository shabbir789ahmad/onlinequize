@extends('Dashboard.master')

@section('content')


<div class="row">
	<div class="col">
		<div class="card card-light">
			<div class="card-header background_color">
				<h1 class="card-title text-light">Add Question</h1>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form action="{{ route('question.store') }}" class="form-horizontal" method="POST">
				@csrf
				<div class="card-body">

					<!-- <div class="form-group mb-3">
					  <div class="input-group">
						<button type="button" id="add-more" class="btn btn-primary py-3 ms-auto">
						  <i class="fa fa-plus-circle"></i>
							Add More
						</button>
					  </div>
					</div> -->
					<div class="form-group row">
						<div class="col-sm-6">
						<label class="label_font_size fw-bold">Quize Type</label>
						 <select class="form-control input_border_color py-3" name="quize_id">
						 	<option disabled selected hidden>Select Quiz Type </option>
						 @foreach($quizes as $quiz)
						  <option value="{{$quiz['id']}}">{{$quiz['quize_name']}}</option>   
						  @endforeach
						 </select>
						</div>
					
						
						<div class="col-sm-6">
							<label class="label_font_size fw-bold">Question</label>
							<textarea name="question[]" placeholder="Question" class="form-control input_border_color" required></textarea>
						</div>
				
						
						<div class="col-sm-6 mt-3">
							<label class="label_font_size fw-bold">Question Marks</label>
							<input type="number" name="marks" class="form-control input_border_color py-3" required placeholder="Marks ">
						</div>

						
						<div class="col-sm-6 mt-5">
							
						</div>
					</div>
					<div class="form-group row mt-3">
					  <label class=" fw-bold label_font_size">Question Choices</label>
					  <div class="col-sm-12" >
					   <div class="form-group row ">
					   	 <div class="form-group mt-3 col-6  ">
							<div class="input-group">
							<div class="input-group-prepend">
							   <span class="input-group-text py-3 input_border_color"><input type="radio" name="correct[0]" value="1" ></span>
							</div>
							<input type="text" name="options[]" class="form-control input_border_color" placeholder="Choice 1">
								</div>
							</div>
							
							
							<div class="form-group col-6 mt-3 ">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text py-3 input_border_color"><input type="radio" name="correct[1]" value="1"></span>
									</div>
									<input type="text" name="options[]" class="form-control input_border_color" placeholder="Choice 2">
								</div>
							</div>
						
						
							<div class="form-group col-6 mt-3 ">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text py-3 input_border_color"><input type="radio" name="correct[2]" value="1"></span>
									</div>
									<input type="text" name="options[]" class="form-control input_border_color" placeholder="Choice 3">
								</div>
							</div>
					
					
							<div class="form-group mt-3 col-6 ">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text py-3 input_border_color"><input type="radio" name="correct[3]" value="1"></span>
									</div>
									<input type="text" name="options[]" class="form-control input_border_color" placeholder="Choice 4">
								</div>
							</div>
						
					   </div>
					 </div>	
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-info">Save</button>
				</div>
				<!-- /.card-footer -->
			</form>
		</div>
	</div>
</div>

@endsection

@section('js')

<script>
	
	var index = 3;

	$(document).ready(function() {
		$('#add-more').click(function(event) {
			$('#fields').append(`
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><input type="radio" name="correct[${index}]" value="1"></span>
						</div>
						<input type="text" name="options[]" class="form-control">
						<div class="input-group-append rm-field">
						  <span class="input-group-text">
						  	<i class='fa fa-ban'></i>
						  </span>
						</div>
					</div>
				</div>`);
			index++;
		});

		$(document).on('click', '.rm-field', function(event) {
			$(this).closest('.form-group').remove();
		});
	});

</script>

@endsection