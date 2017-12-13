 

<div class="form-body">
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button> Please fill the required field! </div>
  <!--   <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
-->
 
    <div class="form-group <?php echo e($errors->first('program_name', ' has-error')); ?>">
            <label class="control-label col-md-3">Program Name <span class="required"> * </span></label>
            <div class="col-md-4"> 
                <?php echo Form::text('program_name',null, ['class' => 'form-control','data-required'=>1]); ?> 
                
                <span class="help-block"><?php echo e($errors->first('program_name', ':message')); ?></span>
            </div>
        </div> 

        


        <div class="form-group <?php echo e($errors->first('start_date', ' has-error')); ?>  <?php if(session('field_errors')): ?> <?php echo e('has-group'); ?> <?php endif; ?>">
            <label class="col-md-3 control-label">Start Date 
                <span class="required"> * </span>
            </label>
            <div class="col-md-4"> 

                  <?php echo Form::text('start_date',null, ['id'=>'startdate','class' => 'form-control end_date','data-required'=>1,"size"=>"16","data-date-format"=>"dd/mm/yyyy","data-date-start-date"=>"+0d" ]); ?> 
                
                <span class="help-block"><?php echo e($errors->first('start_date', ':message')); ?></span>
            </div> 
        </div>

         <div class="form-group <?php echo e($errors->first('end_date', ' has-error')); ?>  <?php if(session('field_errors')): ?> <?php echo e('has-group'); ?> <?php endif; ?>">
            <label class="col-md-3 control-label">End Date 
                <span class="required"> * </span>
            </label>
            <div class="col-md-4"> 
                <?php echo Form::text('end_date',null, ['id'=>'enddate','class' => 'form-control end_date','data-required'=>1,"size"=>"16","data-date-format"=>"dd/mm/yyyy","data-date-start-date"=>"+0d" ]); ?> 


                
                <span class="help-block"><?php echo e($errors->first('end_date', ':message')); ?></span>
            </div> 
        </div>

         <div class="form-group <?php echo e($errors->first('target_users', ' has-error')); ?>  <?php if(session('field_errors')): ?> <?php echo e('has-group'); ?> <?php endif; ?>">
            <label class="col-md-3 control-label">Target Users
                <span class="required"> * </span>
            </label>
            <div class="col-md-4"> 

                <?php echo e(Form::select('target_users',$status, isset($program->target_users)?$program->target_users:'', ['class' => 'form-control'])); ?>

                <span class="help-block"><?php echo e($errors->first('target_users', ':message')); ?></span>
            </div> 
        </div>


         <div class="form-group <?php echo e($errors->first('complete_task', ' has-error')); ?>">
            <label class="control-label col-md-3">Complete Task  </label>
            <div class="col-md-4"> 
                <?php echo Form::text('complete_task',null, ['class' => 'form-control']); ?> 
                
                <span class="help-block"><?php echo e($errors->first('complete_task', ':message')); ?></span>
            </div>
        </div> 
         <div class="form-group <?php echo e($errors->first('reward_point', ' has-error')); ?>">
            <label class="control-label col-md-3">Reward Point </label>
            <div class="col-md-4"> 
                <?php echo Form::text('reward_point',null, ['class' => 'form-control']); ?> 
                
                <span class="help-block"><?php echo e($errors->first('reward_point', ':message')); ?></span>
            </div>
        </div> 
          <div class="form-group <?php echo e($errors->first('description', ' has-error')); ?>">
            <label class="control-label col-md-3">Description<span class="required"> </span></label>
            <div class="col-md-4"> 
                <?php echo Form::textarea('description',null, ['class' => 'form-control','data-required'=>1,'rows'=>3,'cols'=>5]); ?> 
                
                <span class="help-block"><?php echo e($errors->first('description', ':message')); ?></span>
            </div>
        </div> 


    
    
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
          <?php echo Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']); ?>



           <a href="<?php echo e(route('program')); ?>">
<?php echo Form::button('Back', ['class'=>'btn btn-warning text-white']); ?> </a>
        </div>
    </div>
</div>




<div class="form-body">





</div> 

