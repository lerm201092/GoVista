<div class="tab-pane active" id="tab_1"> <!-- begin: Tab_1 -->        
    <div class="row">
    <div class="col-md-12">  
                                                <div class="row">                                                    
                                                    <div class="form-group label-floating">                                                           
                                                            <?php echo Form::hidden('id', $patient[0]->id, ['class' => 'form-control','disabled' ]); ?>

                                                    </div>                                                   
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Identificación</label>
                                                            <?php echo Form::text('tipodoc', $patient[0]->tipodoc.' - '.$patient[0]->numdoc, ['class' => 'form-control','disabled']); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">E-mail</label>
                                                            <?php echo Form::email('email', $patient[0]->email, ['class' => 'form-control','disabled']); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Primer Apellido</label>
                                                            <?php echo Form::text('surname1',$patient[0]->surname1, ['class' => 'form-control','disabled', 'required' => 'required']); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Segundo Apellido</label>
                                                            <?php echo Form::text('surname2', $patient[0]->surname2, ['class' => 'form-control','disabled']); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Primer Nombre</label>
                                                            <?php echo Form::text('name1', $patient[0]->name1, ['class' => 'form-control','disabled', 'required' => 'required']); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Segundo Nombre</label>
                                                            <?php echo Form::text('name2', $patient[0]->name2, ['class' => 'form-control','disabled']); ?>

                                                        </div>
                                                    </div>
                                                </div>
												
         </div> 
     </div>            
</div> <!-- end: Tab_1 -->