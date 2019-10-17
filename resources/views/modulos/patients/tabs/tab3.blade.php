<div class="tab-pane" id="tab_3"> <!-- begin: Tab_3 -->
        <br>
    <div class="row">
    <div class="col-md-12">            
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label ">Dirección</label>
                                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Teléfono</label>
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Zona</label>
                                {!! Form::select('zone', $zona, null, ['class' => 'form-control']) !!}
                                {!! $errors->first('zone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Departamento</label>
                                <select class="form-control" name="dpto_cmb" id="dpto_cmb">
                                    @foreach($areas_dpto as $area_sel)
                                        @if($area_sel->id==$area_sel->id_dpto)
                                            <option value="{{$area_sel->id}}"
                                                    selected>{{$area_sel->nomarea}}</option>
                                        @else
                                            <option value="{{$area_sel->id}}">{{$area_sel->nomarea}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {!! $errors->first('dpto_cmb', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating" id="div_municipio" name="div_municipio">
                                <label class="control-label">Municipio</label>
                                {!! Form::select('id_area',  $areas_munic , null, ['class' => 'form-control']) !!}
                                {!! $errors->first('id_area', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>          
    </div>
</div>
           
</div> <!-- end: Tab_3 -->