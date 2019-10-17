<div class="tab-pane fade" id="tab_3"> <!-- begin: Tab_3 -->
        <br>
        <div class="panel panel-default"> <!-- begin: Panel Lensometría (Tab_3) -->
            <div style="background:#6d4c41 !important;color:white !important;" class="panel-heading"><b>LENSOMETRÍA:</b></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Tipo de Lentes</label>
                            {!! Form::text('tipolente', isset($historyFill) ? $historyFill->tipolente : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('tipolente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Color</label>
                            {!! Form::text('color', isset($historyFill) ? $historyFill->color : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Filtro</label>
                            {!! Form::text('filtro', isset($historyFill) ? $historyFill->filtro : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('filtro', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Coloracion</label>
                            {!! Form::text('coloracion', isset($historyFill) ? $historyFill->coloracion : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('coloracion', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Uso de Lentes</label>
                            {!! Form::text('usolente', isset($historyFill) ? $historyFill->usolente : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('usolente', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div></div> <!-- end: Panel Lensometría (Tab_3) -->

        <div class="panel panel-default"> <!-- begin: Panel Agudeza Visual (Tab_3) -->
            <div style="background:#6d4c41 !important;color:white !important;" class="panel-heading"><b>AGUDEZA VISUAL:</b></div>
            <div class="panel-body">

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <h6 class="text-center">ESFERA <br> (Dioptrias)</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">CILINDRO</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">EJE</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">PRISMA</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">BASE</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OD</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                        <select class="form-control" id="od_esfera" name="od_esfera">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_esfera )
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
                        <select class="form-control" id="od_cilindro" name="od_cilindro">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_cilindro )
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
                            <select class="form-control" id="od_eje" name="od_eje">
                                @foreach ($eje as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_eje )
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
                            {!! Form::text('od_prisma', isset($historyFill) ? $historyFill->od_prisma : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_prisma', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('od_base', isset($historyFill) ? $historyFill->od_base : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_base', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OI</h6>
                    </div>
                    <div class="col-md-2">                        
                        <select class="form-control" id="oi_esfera" name="oi_esfera">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_esfera )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>                        
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                           
                            <select class="form-control" id="oi_cilindro" name="oi_cilindro">
                                @foreach ($esfera_cilindro as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_cilindro )
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
                            <select class="form-control" id="oi_eje" name="oi_eje">
                                @foreach ($eje as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_eje )
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
                            {!! Form::text('oi_prisma', isset($historyFill) ? $historyFill->oi_prisma : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_prisma', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('oi_base', isset($historyFill) ? $historyFill->oi_base : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_base', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <hr>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-center">AGUDEZA VISUAL DE CERCA</h6>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-center">AGUDEZA VISUAL DE LEJOS</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">AV PH</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">CC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">SC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">CC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">SC</h6>
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
                        <select class="form-control" id="od_av_cerca_cc" name="od_av_cerca_cc">
                                @foreach ($cc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_av_cerca_cc )
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
                            <select class="form-control" id="od_av_cerca_sc" name="od_av_cerca_sc">
                                @foreach ($sc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_av_cerca_sc )
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
                            <select class="form-control" id="od_av_lejos_cc" name="od_av_lejos_cc">
                                @foreach ($cc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_av_lejos_cc )
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
                            <select class="form-control" id="od_av_lejos_sc" name="od_av_lejos_sc">
                                @foreach ($sc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_av_lejos_sc )
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
                            <select class="form-control" id="od_av_ph" name="od_av_ph">
                                @foreach ($sc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_av_ph )
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
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="oi_av_cerca_cc" name="oi_av_cerca_cc">
                                @foreach ($cc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_av_cerca_cc )
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
                             <select class="form-control" id="oi_av_cerca_sc" name="oi_av_cerca_sc">
                                @foreach ($sc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_av_cerca_sc )
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
                            <select class="form-control" id="oi_av_lejos_cc" name="oi_av_lejos_cc">
                                @foreach ($cc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_av_lejos_cc )
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
                            <select class="form-control" id="oi_av_lejos_sc" name="oi_av_lejos_sc">
                                @foreach ($sc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_av_lejos_sc )
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
                            <select class="form-control" id="oi_av_ph" name="oi_av_ph">
                                @foreach ($sc as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_av_ph )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select> 
                        </div>
                    </div>
                </div>

                <hr>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-center">ESTADO FORICO HABITUAL</h6>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-center">ESTADO FORICO HABITUAL LEJOS</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">OJO DOMINANTE</h6>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">CC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">SC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">CC</h6>
                    </div>
                    <div class="col-md-2">
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">SC</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            <select class="form-control" id="ojo_dominante" name="ojo_dominante">
                                @foreach ($ojoDominante as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->ojo_dominante )
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
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">HO</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="ho_forico_cerca_cc" name="ho_forico_cerca_cc">
                                @foreach ($ho as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->ho_forico_cerca_cc )
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
                            <select class="form-control" id="ho_forico_cerca_sc" name="ho_forico_cerca_sc">
                                @foreach ($ho as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->ho_forico_cerca_sc )
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
                            <select class="form-control" id="ho_forico_lejos_cc" name="ho_forico_lejos_cc">
                                @foreach ($ho as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->ho_forico_lejos_cc )
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
                            <select class="form-control" id="ho_forico_lejos_sc" name="ho_forico_lejos_sc">
                                @foreach ($ho as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->ho_forico_lejos_sc )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <h6 class="text-center">MANO DOMINANTE</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">VE</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">                            
                            <select class="form-control" id="ve_forico_cerca_cc" name="ve_forico_cerca_cc">
                                @foreach ($ve as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->ve_forico_cerca_cc )
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
                            <select class="form-control" id="ve_forico_cerca_sc" name="ve_forico_cerca_sc">
                                @foreach ($ve as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->ve_forico_cerca_sc )
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
                            <select class="form-control" id="ve_forico_lejos_cc" name="ve_forico_lejos_cc">
                                @foreach ($ve as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->ve_forico_lejos_cc )
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
                            <select class="form-control" id="ve_forico_lejos_sc" name="ve_forico_lejos_sc">
                                @foreach ($ve as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->ve_forico_lejos_sc )
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
                            <select class="form-control" id="mano_dominante" name="mano_dominante">
                                @foreach ($manoDominante as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->mano_dominante )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                        </div>
                    </div>
                </div>

                <hr>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-center">ANGULO KAPPA</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-center">PUNTO PROXIMO DE CONVERGENCIA (PPC)</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OD</h6>
                    </div>
                    <div class="col-md-4">					
					<div class="form-group label-floating">                           
                            <select class="form-control" id="od_ang_kappa" name="od_ang_kappa">
                                @foreach ($anguloKappa as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->od_ang_kappa )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OR</h6>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                        {!! Form::text('ppc_or', isset($historyFill) ? $historyFill->ppc_or : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('ppc_or', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OI</h6>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group label-floating">
                            <select class="form-control" id="oi_ang_kappa" name="oi_ang_kappa">
                                @foreach ($anguloKappa as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->oi_ang_kappa )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                    </div>					
                    </div>
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">SF</h6>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            {!! Form::text('ppc_sf', isset($historyFill) ? $historyFill->ppc_sf : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('ppc_sf', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <hr>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-center">FIJACIÓN</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-center">COVER TEST</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">OD</h6>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('od_fijacion', isset($historyFill) ? $historyFill->od_fijacion : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('od_fijacion', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">LEJOS</h6>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            {!! Form::text('ctest_lejos', isset($historyFill) ? $historyFill->ctest_lejos : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('ctest_lejos', '<p class="help-block">:message</p>') !!}
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
                            {!! Form::text('oi_fijacion', isset($historyFill) ? $historyFill->oi_fijacion : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('oi_fijacion', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <h6 style="font-weight: bold !important;color: black !important;" class="text-center">CERCA</h6>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group label-floating">
                            {!! Form::text('ctest_cerca', isset($historyFill) ? $historyFill->ctest_cerca : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('ctest_cerca', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div style="background:#eee !important;color:black !important;" class="row">
                    <div class="col-md-6">
                        <h6 class="text-center">DISTANCIA INTERPUPILAR (Milimetros)</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-center">TAMAÑO PUPILA (Milimetros)</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('dist_interpupilar', isset($historyFill) ? $historyFill->dist_interpupilar : null,  ['class' => 'form-control']) !!}
                            {!! $errors->first('dist_interpupilar', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2">
                        <div class="form-group label-floating">
                            {!! Form::text('pupila', isset($historyFill) ? $historyFill->pupila : null, ['class' => 'form-control']) !!}
                            {!! $errors->first('pupila', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label class="control-label">OBSERVACIONES:</label>
                        <div class="form-group label-floating">
                            {!! Form::textarea('observacion', isset($historyFill) ? $historyFill->observacion : null, ['class'=>'form-control', 'rows' => 2, 'cols' => 50, 'maxlength' => '500']) !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div> <!-- end: Tab_3 -->