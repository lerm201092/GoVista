<div class="tab-pane" id="tab_4"> <!-- begin: Tab_4 -->
    <br>
    <div class="row">
    <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label ">Nombres</label>
                                {!! Form::text('contact_names', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('contact_names', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Apellidos</label>
                                {!! Form::text('contact_surnames', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('contact_surnames', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Departamento</label>
                                <select class="form-control" name="dpto_cmb_contact" id="dpto_cmb_contact">
                                    @foreach($areas_dpto_contact as $area_sel)
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
                            <div class="form-group label-floating" id="div_municipio_contact"
                                 name="div_municipio_contact">
                                <label class="control-label">Municipio</label>
                                {!! Form::select('contact_city',  $areas_munic_contact , null, ['class' => 'form-control']) !!}
                                {!! $errors->first('contact_city', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label ">Teléfonos - Móvil</label>
                                {!! Form::text('contact_phone', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('contact_phone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
</div> <!-- end: Tab_4 -->