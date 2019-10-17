<div class="tab-pane fade" id="tab_4"> <!-- begin: Tab_4 -->
        <br>
        <div class="panel panel-default">
            <div style="background:#6d4c41 !important;color:white !important;" class="panel-heading"><b>OFTALMOMETRIA:</b></div>
            <div class="panel-body">

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">MERIDIANO 1</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">MERIDIANO 2</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">EJE</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">OBSERVACIONES</h6>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OD</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('od_meridiano1', isset($historyFill) ? $historyFill->od_meridiano1 : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_meridiano1', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('od_meridiano2', isset($historyFill) ? $historyFill->od_meridiano2 : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_meridiano2', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="od_eje_oftal" name="od_eje_oftal">
                                @foreach ($eje as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_eje_oftal )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            {!! Form::textarea('od_obser_oftal', isset($historyFill) ? $historyFill->od_obser_oftal : null, ['class'=>'form-control', 'rows' => 1, 'cols' => 50, 'maxlength' => '500']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OI</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('oi_meridiano1', isset($historyFill) ? $historyFill->oi_meridiano1 : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_meridiano1', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('oi_meridiano2', isset($historyFill) ? $historyFill->oi_meridiano2 : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_meridiano2', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="oi_eje_oftal" name="oi_eje_oftal">
                                @foreach ($eje as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_eje_oftal )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @endif
                                @endforeach
                        </select>                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            {!! Form::textarea('oi_obser_oftal', isset($historyFill) ? $historyFill->oi_obser_oftal : null, ['class'=>'form-control', 'rows' => 1, 'cols' => 50, 'maxlength' => '500']) !!}
                        </div>
                    </div>
                </div>

            </div></div>

        <div class="panel panel-default">
            <div style="background:#6d4c41 !important;color:white !important;" class="panel-heading"><b>RETINOSCOPIA:</b></div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="background:#6d4c41 !important;color:white !important;" class="text-center"><b><u>Tecnica Usada:</u></b></h6>
                    </div>
                </div>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">ESFERA</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">CILINDRO</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">EJE</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">COMPENSADA</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">OBSERVACIONES</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OD</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="od_esfera_tecnica" name="od_esfera_tecnica">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_esfera_tecnica )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="od_cilindro_tecnica" name="od_cilindro_tecnica">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_cilindro_tecnica )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select> 
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">  
                          <select class="form-control" id="od_eje_tecnica" name="od_eje_tecnica">
                                @foreach ($eje as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_eje_tecnica )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @endif
                                @endforeach
                        </select> 
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('od_comp_tecnica', isset($historyFill) ? $historyFill->od_comp_tecnica : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_comp_tecnica', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('od_obser_tecnica', isset($historyFill) ? $historyFill->od_obser_tecnica : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_obser_tecnica', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OI</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="oi_esfera_tecnica" name="oi_esfera_tecnica">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_esfera_tecnica )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                             <select class="form-control" id="oi_cilindro_tecnica" name="oi_cilindro_tecnica">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_cilindro_tecnica )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <select class="form-control" id="oi_eje_tecnica" name="oi_eje_tecnica">
                                @foreach ($eje as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_eje_tecnica )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('oi_comp_tecnica', isset($historyFill) ? $historyFill->oi_comp_tecnica : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_comp_tecnica', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('oi_obser_tecnica', isset($historyFill) ? $historyFill->oi_obser_tecnica : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_obser_tecnica', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="background:#6d4c41 !important;color:white !important;" class="text-center"><b><u>Tipo subjetivo:</u></b></h6>
                    </div>
                </div>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">ESFERA</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">CILINDRO</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">EJE</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">PRISMA</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">BASE</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">ADD</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">AVCC VL</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">AVCC VP</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OD</h6>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="od_esfera_retino" name="od_esfera_retino">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_esfera_retino )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                            
                             <select class="form-control" id="od_cilindro_retino" name="od_cilindro_retino">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_cilindro_retino )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            <select class="form-control" id="od_eje_retino" name="od_eje_retino">
                                @foreach ($eje as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_eje_retino )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('od_prisma_retino', isset($historyFill) ? $historyFill->od_prisma_retino : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_prisma_retino', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('od_base_retino', isset($historyFill) ? $historyFill->od_base_retino : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_base_retino', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('od_add_retino', isset($historyFill) ? $historyFill->od_add_retino : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_add_retino', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="od_avcc_vl_retino" name="od_avcc_vl_retino">
                                @foreach ($sc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_avcc_vl_retino )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>                            
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                         
                            <select class="form-control" id="od_avcc_vp_retino" name="od_avcc_vp_retino">
                                @foreach ($cc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_avcc_vp_retino )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OI</h6>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="oi_esfera_retino" name="oi_esfera_retino">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_esfera_retino )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            <select class="form-control" id="oi_cilindro_retino" name="oi_cilindro_retino">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_cilindro_retino )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="oi_eje_retino" name="oi_eje_retino">
                                @foreach ($eje as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_eje_retino )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('oi_prisma_retino', isset($historyFill) ? $historyFill->oi_prisma_retino : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_prisma_retino', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('oi_base_retino', isset($historyFill) ? $historyFill->oi_base_retino : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_base_retino', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('oi_add_retino', isset($historyFill) ? $historyFill->oi_add_retino : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_add_retino', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating"> 
                            <select class="form-control" id="oi_avcc_vl_retino" name="oi_avcc_vl_retino">
                                @foreach ($sc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_avcc_vl_retino )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                           
                             <select class="form-control" id="oi_avcc_vp_retino" name="oi_avcc_vp_retino">
                                @foreach ($cc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_avcc_vp_retino )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="background:#6d4c41 !important;color:white !important;" class="text-center"><b><u>Tipo subjetivo:</u></b></h6>
                    </div>
                </div>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">ESFERA</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">CILINDRO</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">EJE</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">PRISMA</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">BASE</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">ADD</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">AVCC VL</h6>
                    </div>
                    <div class="col-md-1">
                        <h6 class="text-center">AVCC VP</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OD</h6>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            <select class="form-control" id="od_esfera_retino2" name="od_esfera_retino2">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_esfera_retino2 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                          
                             <select class="form-control" id="od_cilindro_retino2" name="od_cilindro_retino2">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_cilindro_retino2 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="od_eje_retino2" name="od_eje_retino2">
                                @foreach ($eje as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_eje_retino2 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('od_prisma_retino2', isset($historyFill) ? $historyFill->od_prisma_retino2 : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_prisma_retino2', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('od_base_retino2', isset($historyFill) ? $historyFill->od_base_retino2 : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_base_retino2', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('od_add_retino2', isset($historyFill) ? $historyFill->od_add_retino2 : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_add_retino2', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="od_avcc_vl_retino2" name="od_avcc_vl_retino2">
                                @foreach ($sc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_avcc_vl_retino2 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            <select class="form-control" id="od_avcc_vp_retino2" name="od_avcc_vp_retino2">
                                @foreach ($cc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_avcc_vp_retino2 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OI</h6>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            <select class="form-control" id="oi_esfera_retino2" name="oi_esfera_retino2">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_esfera_retino2 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="oi_cilindro_retino2" name="oi_cilindro_retino2">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_cilindro_retino2 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="oi_eje_retino2" name="oi_eje_retino2">
                                @foreach ($eje as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_eje_retino2 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}@if($itemValue != null)&#176; @endif</option>
                                @endif
                                @endforeach
                        </select>
                            
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('oi_prisma_retino2', isset($historyFill) ? $historyFill->oi_prisma_retino2 : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_prisma_retino2', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('oi_base_retino2', isset($historyFill) ? $historyFill->oi_base_retino2 : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_base_retino2', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">
                            {!! Form::text('oi_add_retino2', isset($historyFill) ? $historyFill->oi_add_retino2 : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_add_retino2', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="oi_avcc_vl_retino2" name="oi_avcc_vl_retino2">
                                @foreach ($sc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_avcc_vl_retino2 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group label-floating"> 
                            <select class="form-control" id="oi_avcc_vp_retino2" name="oi_avcc_vp_retino2">
                                @foreach ($cc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_avcc_vp_retino2 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div> <!-- end: Tab_4 -->