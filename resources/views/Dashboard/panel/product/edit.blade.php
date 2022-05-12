@extends('Dashboard.master')

@section('content')

<form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST">
	@method('PUT')
	@csrf
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div class="form-group mt-3">
						<label for="" class="fw-bold mb-1">
							Category Name <span class="text-danger">*</span>
						</label>
						<x-form.input name="category_name" value="{{$category['category_name']}}"></x-forms.input>
						
					</div>
					<div class="form-group mt-3  mb-5">
						<label for="" class="fw-bold mb-1">
							Category Logo <span class="text-danger">*</span>
						</label>
						<x-form.inputimg name="image"></x-forms.inputimg>
							<img src="{{asset('uploads/brand/' .$category['category_image'])}}" width="10%" class="rounded">
					</div>
					<x-btn.update></x-btn.update>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection