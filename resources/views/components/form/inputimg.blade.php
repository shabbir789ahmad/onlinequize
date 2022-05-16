<input 
    
    {{ $attributes->merge(['id' => ($attributes->get('name') . '_inp'), 'class' => 'form-control py-3 input_border_color' , 'type' => 'file', 'placeholder' => $attributes->get('placeholder') ?? Str::title(Str::of($attributes->get('name'))->replace('_', ' ')), 'value' => old($attributes->get('name'))]) }}

/>

@error($attributes->get('name')) <div class="small text-danger"> <i class="fa fa-times-circle"></i> {{ $message }}</div> @enderror
