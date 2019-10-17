<div class="tab-pane active" id="tab_1"> <!-- begin: Tab_1 -->
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group label-floating">
                    <label class="control-label">Antecedentes</label>
                    <?php echo Form::textarea('antecedente', isset($historyFill) ? $historyFill->antecedente : null,  ['class' => 'form-control', 'maxlength' => '500']); ?>

                    <?php echo $errors->first('antecedente', '<p class="help-block">:message</p>'); ?>

                </div>
            </div>
        </div>
</div> <!-- end: Tab_1 -->





