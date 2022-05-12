@extends('Dashboard.master')

@section('content')

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-header fw-bold"><h3>Create Product</h3></div>
				<div class="card-body">

					<div class="row">
					  <div class="col-md-6 col-12">
                        <x-form.select name="category_id" :categories="$categories" select="Category"  />
					  </div>
					  <div class="col-md-6 col-12">
                        <select name="sub_category_id" class="form-control py-3 border border-secondary sub_category_id" >
                        	
                        </select>
					  </div>
					</div>

					<div class="row">
					  <div class="col-md-6 col-12">
						<x-form.input name="product_name" label="Product Name" /> 
						</div>
						<div class="col-md-6 col-12">
						<x-form.input name="product_code" label="Product Code " /> 
						</div>
					</div>

					<div class="row">
					  <div class="col-md-12 col-12">
                        <label for="" class="fw-bold mb-1">
							Product Detail <span class="text-danger">*</span>
						</label>
						<textarea class="form-control border border-secondary	" name="product_detail" rows="5"></textarea>
					  </div>
					</div>

					<div class="row">
					  <div class="col-md-6 col-12">
						<x-form.input name="selling_price" label="Product Price" /> 
						</div>
						<div class="col-md-6 col-12">
						<x-form.input name="product_discount" label="Product Discount " /> 
						</div>
					</div>

					<div class="row">
					  <div class="col-md-6 col-12">
						<x-form.input name="stock" label="Product Stock" /> 
						</div>
						<div class="col-md-6 col-12">
						<x-form.input name="purchasing_price" label="Product Purchasing Price " /> 
						</div>
					</div>

					<div class="row">
					  <div class="col-md-6 col-12">
						<x-form.input name="product_tax" label="Product Tax" /> 
						</div>
						<div class="col-md-6 col-12">
						<x-form.input name="product_brand[]" label="Product Brand " /> 
						</div>
					</div>

					<div class="form-group mt-3  mb-5">
						<label for="" class="fw-bold mb-1">
							Product Image <span class="text-danger">*</span>
						</label>
						<x-form.inputimg name="product_image[]"  multiple accept="image/*"/>
					</div>
					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection