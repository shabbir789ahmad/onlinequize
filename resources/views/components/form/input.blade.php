<div class="form-group mt-3">
    <label for="" class="fw-bold mb-1">
                  {{$attributes->get('label')}} <span class="text-danger">*</span>
             </label>
                     
                        
                  


<input 
    
    {{ $attributes->merge(['id' => ($attributes->get('name') . '_inp'), 'class' => 'form-control py-3 border border-secondary' , 'type' => 'text', 'placeholder' => $attributes->get('placeholder') ?? Str::title(Str::of($attributes->get('name'))->replace('_', ' ')), 'value' => old($attributes->get('name'))]) }}

/>
  </div>
@error($attributes->get('name')) <div class="small text-danger"> <i class="fa fa-times-circle"></i> {{ $message }}</div> @enderror
