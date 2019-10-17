<div class="tab-pane fade" id="tab_2"> <!-- begin: Tab_2 -->
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group label-floating">
                    <label class="control-label">Motivo de Consulta:</label>
                    
                    <?php echo Form::textarea('motivo', isset($historyFill) ? $historyFill->motivo : null,  ['class' => 'form-control', 'maxlength' => '500','disabled']); ?>

                    <?php echo $errors->first('motivo', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group label-floating">
                    <label class="control-label">Enfermedad Actual:</label>
                    <?php echo Form::textarea('enfactual', isset($historyFill) ? $historyFill->enfactual : null,  ['class' => 'form-control', 'maxlength' => '500','disabled']); ?>

                    <?php echo $errors->first('enfactual', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>
</div> <!-- end: Tab_2 -->