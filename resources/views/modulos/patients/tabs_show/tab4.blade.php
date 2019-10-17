<div class="tab-pane" id="tab_4"> <!-- begin: Tab_4 -->
    <br>
     <div class="row">
                                <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label ">Nombres</label>
                                                            {!! Form::text('contact_names', $patient[0]->contact_names, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Apellidos</label>
                                                            {!! Form::text('contact_surnames', $patient[0]->contact_surnames, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Departamento</label>
                                                            {!! Form::text('dpto_cmb', $patient[0]->dpto_contact, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating"
                                                             id="div_municipio_contact"
                                                             name="div_municipio_contact">
                                                            <label class="control-label">Municipio</label>
                                                            {!! Form::text('contact_city',  $patient[0]->municipio_contact, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label ">Teléfonos - Móvil</label>
                                                            {!! Form::text('contact_phone', $patient[0]->contact_phone, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                                                      
                                </div>
                            </div>
</div> <!-- end: Tab_4 -->