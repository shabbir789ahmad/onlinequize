 Q : {{$quizes['question']}}
                <input type="text" id="question_id" value="{{$quizes['id']}}">
                

@foreach($quizes->options as $quize)
                 <div class="form-group mt-3 col-6 ">
                  <div class="input-group option_click">
                   <div class="input-group-prepend">
                     <span class="input-group-text py-3 input_border_color"><input type="radio" name="correct" value="{{$quize['id']}}" class="option_input"></span>
                    </div>
                    <input type="text" name="option" class="form-control input_border_color" value="{{$quize['option']}}" readonly>
                  </div>
                 </div>
                 @endforeach






                 