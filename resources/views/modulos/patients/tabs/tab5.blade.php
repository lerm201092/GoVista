<div class="tab-pane" id="tab_5"> <!-- begin: Tab_5 -->
    <br>	   
	<div class="row">
    <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label ">Nombres del Padre</label>
                                {!! Form::text('father_name', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('father_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Apellidos del Padre</label>
                                {!! Form::text('father_surname', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('father_surname', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label ">Teléfonos - Móvil</label>
                                {!! Form::text('father_phone', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('father_phone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label ">E-mail</label>
                                {!! Form::email('father_email', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('father_email', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label ">Nombres de la Madre</label>
                                {!! Form::text('mother_name', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('mother_name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Apellidos de la Madre</label>
                                {!! Form::text('mother_surname', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('mother_surname', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label ">Teléfonos - Móvil</label>
                                {!! Form::text('mother_phone', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('mother_phone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label ">E-mail</label>
                                {!! Form::email('mother_email', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('mother_email', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
</div> <!-- end: Tab_5 -->