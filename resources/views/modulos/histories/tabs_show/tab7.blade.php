<div class="tab-pane fade" id="tab_7"> <!-- begin: Tab_7 -->

<div class="container-fluid">
<br><br>
<!--Table-->
<table id="tableAddExercise" class="table table-hover">
<!--Table head-->
  <thead>
    <tr>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">NOMBRE EJERCICIO</th>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">USO</th>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">DESCRIPCIÓN</th>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">NO. SESIONES</th>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">TAMAÑO</th>
      <th style="color: #9c27b0 !important;border-bottom: 1px solid gray !important;text-align: center !important;font-weight: bold !important;">TIEMPO</th>     
    </tr>
  </thead>
  <!--Table head-->
  <!--Table body-->
  <tbody>
  @foreach ($exercises as $e)
    <tr>
      <td> 
	  <div class="form-group label-floating">
<div style="text-align: left !important;">		
<label style="line-height: unset !important;" class="containerInput">
  @if ( count($historyExerciseFill->where('id_exercise', $e->id)) > 0)
  <input disabled id="id_exercise_{{ $e->id }}" name="id_exercise[]" class="form-check-input" type="checkbox" value="{{ $e->id }}" checked>  
  @else
  <input disabled id="id_exercise_{{ $e->id }}" name="id_exercise[]" class="form-check-input" type="checkbox" value="{{ $e->id }}">  
  @endif  
  <span style="color: black !important;font-size: 11pt !important;font-weight: bold !important;">{{ $e->description }}</span> 
  <span class="checkmark"></span>
</label>
</div>
</div>  
	  </td>     
      <td>	      
	  <div class="form-group label-floating">		    		
	  <input disabled id="useExercise_{{ $e->id }}" name="useExercise[]" rel="tooltip" title="{{ $e->useExercise }}" class="form-control" readonly type="text" value="{{ $e->useExercise }}">
      </div>
	  </td>
      <td>
	  <div class="form-group label-floating">
        <textarea id="observation_{{ $e->id }}" name="observation[]" rel="tooltip" title="{{ $e->observation }}" style="white-space: nowrap !important;resize: both !important;overflow: auto !important;" class="form-control" readonly rows="1" cols="25">
	@if ( count($historyExerciseFill->where('id_exercise', '=', $e->id)) > 0) 
		{{ $historyExerciseFill->where('id_exercise', '=', $e->id)->first()->observation }}
		@else
		{{ $e->observation }}
	@endif
	    </textarea>
        </div>	  
	  </td>
      <td style="width: auto !important;">
	  <div class="form-group label-floating">	  
	  @if ( count($historyExerciseFill->where('id_exercise', '=', $e->id)) > 0) 
       <input disabled id="session_{{ $e->id }}" name="session[]" style="text-align: center !important;width: 80px;" class="form-control" min="1" max="10" type="number" value='{{ $historyExerciseFill->where('id_exercise', '=', $e->id)->first()->session }}'>
		@else
		<input disabled id="session_{{ $e->id }}" name="session[]" style="text-align: center !important;width: 80px;" class="form-control" min="1" max="10" type="number" value=''>
 	@endif 	
	  </div>
	  </td>
      <td style="width: auto !important;">
	  <div class="form-group label-floating">
@if ( count($historyExerciseFill->where('id_exercise', '=', $e->id)) > 0) 
		<select disabled class="form-control" id="size_{{ $e->id }}" name="size[]">	        
            @foreach ($visual_acuity as $visual_acuityKey => $visual_acuityValue)	
@if ( $historyExerciseFill->where('id_exercise', '=', $e->id)->first()->size == $visual_acuityKey)
<option value="{{ $visual_acuityKey }}" selected>{{$visual_acuityValue}}@if($visual_acuityValue != null) @endif</option>

@else
	<option value="{{ $visual_acuityKey }}">{{$visual_acuityValue}}@if($visual_acuityValue != null) @endif</option>
@endif		                 
            @endforeach
        </select>
		@else		
	<select disabled class="form-control" id="size_{{ $e->id }}" name="size[]">	        
            @foreach ($visual_acuity as $visual_acuityKey => $visual_acuityValue)			     
                 <option value="{{ $visual_acuityKey }}">{{$visual_acuityValue}}@if($visual_acuityValue != null) @endif</option>
            @endforeach
        </select>
	@endif 
        {!! $errors->first('size[]', '<p class="help-block">:message</p>') !!}
	  </div>
	  </td> 
     <td style="width: auto !important;">
	  <div class="form-group label-floating">	  	
		@if ( count($historyExerciseFill->where('id_exercise', '=', $e->id)) > 0) 
			<input disabled id="duration_{{ $e->id }}" name="duration[]" style="text-align: center !important;width: 80px;" class="form-control" min="5" max="30" step="5" type="number" value='{{ $historyExerciseFill->where('id_exercise', '=', $e->id)->first()->duration }}'>
		@else
		<input disabled id="duration_{{ $e->id }}" name="duration[]" style="text-align: center !important;width: 80px;" class="form-control" min="5" max="30" step="5" type="number" value=''>
		@endif 			
	  </div>
	  </td>
    </tr>  
	@endforeach
  </tbody>
  <!--Table body-->
</table>
<!--Table-->
</div>

</div> <!-- end: Tab_7 -->

<script type="text/javascript"> 
    $(document).ready(function () {
		@foreach ($exercises as $e)
		$( '#id_exercise_{{ $e->id }}' ).on( 'click', function() {
		if( $(this).is(':checked') ){
			$("#id_exercise_{{ $e->id }}").prop('required',true);
			$("#useExercise_{{ $e->id }}").prop('required',true);
			$("#observation_{{ $e->id }}").prop('required',true);
			$("#size_{{ $e->id }}").prop('required',true);
			$("#session_{{ $e->id }}").prop('required',true);
			$("#duration_{{ $e->id }}").prop('required',true); 	   
        } else {
			$("#id_exercise_{{ $e->id }}").prop('required',false);
			$("#useExercise_{{ $e->id }}").prop('required',false);
			$("#observation_{{ $e->id }}").prop('required',false);
			$("#size_{{ $e->id }}").prop('required',false);
			$("#session_{{ $e->id }}").prop('required',false);
			$("#duration_{{ $e->id }}").prop('required',false);
        }
		});
		@endforeach
    });
</script>
