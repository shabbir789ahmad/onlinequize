@extends('Dashboard.master')

@section('content')

<form action="{{ route('quiz.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-header background_color">
                  Create Quiz
				</div>
				<div class="card-body">
				 <div class="row">
                   <div class="form-group col-6 mt-3">
						<x-form.input name="quize_name" label="Quiz Name" type="text"></x-forms.input>
						
					</div>
                    <div class="form-group col-6 mt-3 ">
						<x-form.input name="start_date" label="Start Date" type="datetime-local"></x-forms.input>
						
					</div>

					<div class="form-group col-6  ">
						<x-form.input name="start_time" label="Start Time" type="time"></x-forms.input>
						
					</div>
                    
                    <div class="form-group col-6  ">
						<x-form.input name="end_time" label="End Time" type="time"></x-forms.input>
						
					</div>
                    
                    <div class="form-group col-6 mb-4">
						<x-form.input name="time_per_question" label="Time Per Question" type="number"></x-forms.input>
						
					</div>

					<div class="form-group col-6 mt-3 mb-4">
						<label for="" class="fw-bold mb-1 label_font_size">
							Quiz Image <span class="text-danger">*</span>
						</label>
						<x-form.inputimg name="image"></x-forms.inputimg>
					</div>
					</div>
					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection