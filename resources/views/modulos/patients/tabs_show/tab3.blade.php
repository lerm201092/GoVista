<div class="tab-pane" id="tab_3"> <!-- begin: Tab_3 -->
 <br>
       <div class="row">
                                <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label ">Dirección</label>
                                                            {!! Form::text('address', $patient[0]->address, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Teléfono</label>
                                                            {!! Form::text('phone', $patient[0]->phone, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Zona</label>
                                                            {!! Form::text('zone', ( $patient[0]->zone = 'U' ) ? 'Urbana' : 'Rural', ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Departamento</label>
                                                            {!! Form::text('dpto_cmb', $patient[0]->dpto, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating" id="div_municipio"
                                                             name="div_municipio">
                                                            <label class="control-label">Municipio</label>
                                                            {!! Form::text('id_area', $patient[0]->municipio, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                            </div>           
</div> <!-- end: Tab_3 -->