<div class="tab-pane" id="tab_5"> <!-- begin: Tab_5 -->
    <br>	   
	<div class="row">
                                <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label ">Nombres del Padre</label>
                                                            {!! Form::text('father_name', $patient[0]->father_name, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Apellidos del Padre</label>
                                                            {!! Form::text('father_surname', $patient[0]->father_surname, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label ">Teléfonos - Móvil</label>
                                                            {!! Form::text('father_phone', $patient[0]->father_phone, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label ">E-mail</label>
                                                            {!! Form::email('father_email', $patient[0]->father_email, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label ">Nombres de la Madre</label>
                                                            {!! Form::text('mother_name', $patient[0]->mother_name, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Apellidos de la Madre</label>
                                                            {!! Form::text('mother_surname', $patient[0]->mother_surname, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label ">Teléfonos - Móvil</label>
                                                            {!! Form::text('mother_phone', $patient[0]->mother_phone, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label ">E-mail</label>
                                                            {!! Form::email('mother_email', $patient[0]->mother_email, ['class' => 'form-control','disabled']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                            </div>
</div> <!-- end: Tab_5 -->