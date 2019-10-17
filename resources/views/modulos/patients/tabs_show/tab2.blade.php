<div class="tab-pane" id="tab_2"> <!-- begin: Tab_2 -->
<br>
  <div class="row">
                                <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label ">Fecha de Nacimiento</label>
                                                            {!! Form::text('birthdate',$patient[0]->birthdate, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Sexo</label>
                                                            {!! Form::text('sex',($patient[0]->sex=='M') ? 'Masculino' : 'Femenino', ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Entidad Prestadora de
                                                                Salud</label>
                                                            {!! Form::text('id_eps', $patient[0]->eps, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Estado</label>
                                                            {!! Form::text('state', ($patient[0]->state='AC') ? 'Activo' : 'Inactivo', ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                            </div>                                       
</div> <!-- end: Tab_2 -->