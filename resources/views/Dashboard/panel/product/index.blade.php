@extends('Dashboard.master')

@section('content')

<div class="row ml-4">
	<div class="col-12">
		<div class="form-group mt-3 mb-3 ">
			<x-btn.link-create route="product.create" ></x-btn.link-create>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body pb-1">
				@if(count($products) > 0)
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead class="thead-light">
								<tr>
									<th scope="col" class="col-1"> Image</th>
									<th scope="col" class="col-2">Name</th>
									<th scope="col" class="col-2">Category</th>
									<th scope="col" class="col-2">SubCategory</th>
									<th scope="col" class="col-2">Price</th>
									<th scope="col" class="col-1">Stock</th>
									<th scope="col" class="col-1">Stock Sold</th>
									<th scope="col" class="col-1"></th>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $product)
								<tr>
									
									<td class="col-1 text-center"><img @if($product->image) src="{{asset('uploads/img/' .$product->image->product_image)}}"  @endif class="rounded" width="100%" height="60rem"></td>
									
									<td >{{ $product->product_name }}</td>
									<td >{{ $product->category_name }}</td>
									<td >{{ $product->sub_category_name }}</td>
									<td >{{ $product->product_brand }}</td>
									<td >{{ $product->stock['stock'] }}</td>
									<td >{{ $product->stock['stock_sold'] }}</td>
									
									
									<td class="d-flex px-1 justify-content-between">
										<a href="{{ route('product.edit', ['product' => $product->product_id]) }}" type="submit" class="btn btn-xs p-1 btn-info ">
											Edit
										</a>
										<form action="{{ route('product.destroy', ['product' => $product->product_id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
											@method('DELETE')
											@csrf
											<button type="submit" class="btn btn-xs btn-danger p-1">
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
					<x-alert.resource-empty resource="product" new="product.create"></x-alert.resource-empty>
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