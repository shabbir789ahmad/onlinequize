

<select 
    
    {{ $attributes->merge(['id' => ($attributes->get('name') . '_inp'), 'class' => 'form-control py-3 border border-secondary category_id' , 'value' => old($attributes->get('name'))]) }}

>
<option disabled hidden selected>Select {{$attributes->get('select')}}</option>
@foreach($categories as $category)
<option value="{{$category['id']}}">{{$category['category_name']}}</option>
@endforeach
</select>

@error($attributes->get('name')) <div class="small text-danger"> <i class="fa fa-times-circle"></i> {{ $message }}</div> @enderror
