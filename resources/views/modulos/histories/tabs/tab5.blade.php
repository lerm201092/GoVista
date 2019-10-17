<div class="tab-pane fade" id="tab_5">  <!-- begin: Tab_5 -->
        <br>
        <div class="row"> 
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Luces worth</h6>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Distancia (CM)</h6>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Ojo que Suprime</h6>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Bagolini</h6>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Post Imagenes</h6>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center">Anomalia</h6>
            </div>
        </div>


        <div class="row">
            <div class="col-md-2">
                <div class="form-group label-floating">      
                    <select class="form-control" id="luz_worth" name="luz_worth">
                                @foreach ($LucesWorth as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->luz_worth )
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
                      <select class="form-control" id="distancia" name="distancia">
                                @foreach ($distanciaCM as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->distancia )
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
                    <select class="form-control" id="ojo_suprime" name="ojo_suprime">
                                @foreach ($OjoSuprime as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->ojo_suprime )
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
                    <select class="form-control" id="bagolini" name="bagolini">
                                @foreach ($Bagolini as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->bagolini )
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
                    <select class="form-control" id="post_img" name="post_img">
                                @foreach ($PostImagenes as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->post_img )
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
                    <select class="form-control" id="ang_anomalia" name="ang_anomalia">
                                @foreach ($angulo as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->ang_anomalia )
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
            <div class="col-md-4">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>Correspondencia Sensorial:</h6>
            </div>
            <div class="col-md-1">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center"><br>Cerca:</h6>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">                   
                    <select class="form-control" id="cs_cerca" name="cs_cerca">
                                @foreach ($CorrespondenciaSensorial as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->cs_cerca )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                </div>
            </div>
            <div class="col-md-1">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center"><br>Lejos:</h6>
            </div>
            <div class="col-md-3">
                <div class="form-group label-floating">                    
                     <select class="form-control" id="cs_lejos" name="cs_lejos">
                                @foreach ($CorrespondenciaSensorial as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->cs_lejos )
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
            <div class="col-md-12">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-center"><b>Estereopsis:</b></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>Test Usado:</h6>
            </div>
            <div class="col-md-10">
                <div class="form-group label-floating">
                   <select class="form-control" id="test" name="test">
                                @foreach ($TestUsado as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemValue ==  $historyFill->test )
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
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>RFNV VL</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    {!! Form::text('rfnv_vl', isset($historyFill) ? $historyFill->rfnv_vl : null,  ['class' => 'form-control']) !!}
                    {!! $errors->first('rfnv_vl', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>RFN VP</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    {!! Form::text('rfn_vp', isset($historyFill) ? $historyFill->rfn_vp : null,  ['class' => 'form-control']) !!}
                    {!! $errors->first('rfn_vp', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>RFP VL</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    {!! Form::text('rfp_vl', isset($historyFill) ? $historyFill->rfp_vl : null,  ['class' => 'form-control']) !!}
                    {!! $errors->first('rfp_vl', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>RFP VP</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    {!! Form::text('rfp_vp', isset($historyFill) ? $historyFill->rfp_vp : null,  ['class' => 'form-control']) !!}
                    {!! $errors->first('rfp_vp', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>AA OD</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    {!! Form::text('aa_od', isset($historyFill) ? $historyFill->aa_od : null,  ['class' => 'form-control']) !!}
                    {!! $errors->first('aa_od', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>AA OI</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    {!! Form::text('aa_oi', isset($historyFill) ? $historyFill->aa_oi : null,  ['class' => 'form-control']) !!}
                    {!! $errors->first('aa_oi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>NIVEL VISUAL OD</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    {!! Form::text('nivel_visual_od', isset($historyFill) ? $historyFill->nivel_visual_od : null,  ['class' => 'form-control']) !!}
                    {!! $errors->first('nivel_visual_od', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>NIVEL VISUAL OI</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    {!! Form::text('nivel_visual_oi', isset($historyFill) ? $historyFill->nivel_visual_oi : null,  ['class' => 'form-control']) !!}
                    {!! $errors->first('nivel_visual_oi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>TECNICA</h6>
            </div>
            <div class="col-md-10">
                <div class="form-group label-floating">
                    {!! Form::text('tecnica', isset($historyFill) ? $historyFill->tecnica : null,  ['class' => 'form-control']) !!}
                    {!! $errors->first('tecnica', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>FLEXIBILIDAD OD</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    {!! Form::text('flexibilidad_od', isset($historyFill) ? $historyFill->flexibilidad_od : null,  ['class' => 'form-control']) !!}
                    {!! $errors->first('flexibilidad_od', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>FLEXIBILIDAD OI</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    {!! Form::text('flexibilidad_oi', isset($historyFill) ? $historyFill->flexibilidad_oi : null,  ['class' => 'form-control']) !!}
                    {!! $errors->first('flexibilidad_oi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

</div> <!-- end: Tab_5 -->