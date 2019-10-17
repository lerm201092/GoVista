<div class="tab-pane active" id="tab_1"> <!-- begin: Tab_1 -->        
        <div class="col-md-12">
                    <div class="row">                        
                        <div class="form-group label-floating">                                
                                {!! Form::hidden('id', null, ['class' => 'form-control','disabled' ]) !!}
                                {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
                        </div>                       
                        <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Tipo de Documento</label>
                                {!! Form::select('tipodoc', $tipo_documento, null, ['class' => 'form-control']) !!}
                                {!! $errors->first('tipodoc', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Documento de Identidad</label>
                                {!! Form::text('numdoc', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('numdoc', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group label-floating">
                                <label class="control-label">E-mail</label>
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Primer Apellido</label>
                                {!! Form::text('surname1', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                {!! $errors->first('surname1', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Segundo Apellido</label>
                                {!! Form::text('surname2', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('surname2', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Primer Nombre</label>
                                {!! Form::text('name1', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                {!! $errors->first('name1', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Segundo Nombre</label>
                                {!! Form::text('name2', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('name2', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
</div> <!-- end: Tab_1 -->