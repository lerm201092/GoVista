<div class="tab-pane" id="tab_2"> <!-- begin: Tab_2 -->
        <br>
        <div class="col-md-12">
                   <div class="row">  
                    <div class="row">
					    <div class="col-md-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Estado</label>
                                <?php echo Form::select('state', $estados , null, ['class' => 'form-control']); ?>

                                <?php echo $errors->first('state', '<p class="help-block">:message</p>'); ?>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group label-floating">
                                <label class="control-label ">Fecha de Nacimiento</label>
                                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd">
                                    <?php echo Form::text('birthdate', isset($birthdate) ? $birthdate : date("Y-m-d") , ['class' => 'form-control','readonly']); ?>

                                    <?php echo $errors->first('birthdate', '<p class="help-block">:message</p>'); ?>

                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Sexo</label>
                                <?php echo Form::select('sex', $sexo, null, ['class' => 'form-control']); ?>

                                <?php echo $errors->first('sex', '<p class="help-block">:message</p>'); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Entidad Prestadora de Salud</label>
                                <?php echo Form::select('id_eps', $entidades_eps, null, ['class' => 'form-control']); ?>

                                <?php echo $errors->first('id_eps', '<p class="help-block">:message</p>'); ?>

                            </div>
                        </div>
                    </div>
</div>
</div>
</div> <!-- end: Tab_2 -->