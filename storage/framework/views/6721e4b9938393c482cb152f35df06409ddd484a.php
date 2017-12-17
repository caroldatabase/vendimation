 

<div class="form-body">
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button> Please fill the required field! </div>
  <!--   <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
-->

      
            <div class="form-group <?php echo e($errors->first('title', ' has-error')); ?>">
                <label class="control-label col-md-3">Select Title
                    <span class="required" aria-required="true">  </span>
                </label>
                <div class="col-md-4"> 
                <select name="title" class="form-control">
                   <option value="Mr." <?php echo e((isset($contact->title) && $contact->title=="Mr.")?"selected":''); ?>> 
                        Mr. 
                    </option>         
                    <option value="Mrs." <?php echo e((isset($contact->title) && $contact->title=="Mrs.")?"selected":''); ?> > 
                        Mrs. 
                    </option>
                     <option value="Miss" <?php echo e((isset($contact->title) && $contact->title=="Miss")?"selected":''); ?> > 
                        Miss 
                    </option>
                </select>
                    <span class="help-block"></span>
                </div>
            </div>



    <div class="form-group <?php echo e($errors->first('firstName', ' has-error')); ?>">
        <label class="control-label col-md-3">First Name <span class="required"> * </span></label>
        <div class="col-md-4"> 
            <?php echo Form::text('firstName',null, ['class' => 'form-control','data-required'=>1]); ?> 
            
            <span class="help-block"><?php echo e($errors->first('firstName', ':message')); ?></span>
        </div>
    </div> 

    <div class="form-group <?php echo e($errors->first('lastName', ' has-error')); ?>">
        <label class="control-label col-md-3">Last Name </label>
        <div class="col-md-4"> 
            <?php echo Form::text('lastName',null, ['class' => 'form-control','data-required'=>1]); ?> 
            
            <span class="help-block"><?php echo e($errors->first('lastName', ':message')); ?></span>
        </div>
    </div> 

     <div class="form-group <?php echo e($errors->first('position', ' has-error')); ?>">
        <label class="control-label col-md-3">Position </label>
        <div class="col-md-4"> 
            <?php echo Form::text('position',null, ['class' => 'form-control','data-required'=>1]); ?> 
            
            <span class="help-block"><?php echo e($errors->first('position', ':message')); ?></span>
        </div>
    </div> 

    <div class="form-group <?php echo e($errors->first('phone', ' has-error')); ?>">
        <label class="control-label col-md-3">Phone </label>
        <div class="col-md-4"> 
            <?php echo Form::text('phone',null, ['class' => 'form-control','data-required'=>1,'min'=>10]); ?> 
            <span class="help-block"><?php echo e($errors->first('phone', ':message')); ?></span>
        </div>
    </div> 


    <div class="form-group <?php echo e($errors->first('email', ' has-error')); ?>  <?php if(session('field_errors')): ?> <?php echo e('has-group'); ?> <?php endif; ?>">
        <label class="col-md-3 control-label">Email 
            <span class="required"> * </span>
        </label>
        <div class="col-md-4"> 
                
         <?php echo Form::email('email',null, ['class' => 'form-control','data-required'=>1]); ?> 
        <span class="help-block" style="color:red"><?php echo e($errors->first('email', ':message')); ?> <?php if(session('field_errors')): ?> <?php echo e('The email has already been taken.'); ?> <?php endif; ?></span>

        </div> 
    </div>

     

     <div class="form-group <?php echo e($errors->first('categoryName', ' has-error')); ?>">
        <label class="control-label col-md-3">Select Category
            <span class="required">  </span>
        </label>
        <div class="col-md-4"> 
        <div class="portlet-body">
             <select class="mt-multiselect btn btn-default" multiple="multiple" data-label="right" data-select-all="true" data-width="100%"  name="categoryName[]" data-action-onchange="true">
                <?php foreach($categories as $key=>$value): ?>
                <option value="<?php echo e($value->id); ?>" <?php if(isset($category_id) && (in_array($value->id,$category_id))): ?> <?php echo e('selected="selected"'); ?>  <?php endif; ?>

                <?php if($value->id==old('categoryName')): ?>  <?php echo e('selected="selected"'); ?> <?php endif; ?>
                  >

                <?php echo e($value->category_name); ?>

                
                </option>
                <?php endforeach; ?>
            </select>
            </div>
            <span class="help-block"><?php echo e($errors->first('categoryName', ':message')); ?></span>
        </div>
    </div> 
 



<div class="form-group <?php echo e($errors->first('address', ' has-error')); ?>">
    <label class="control-label col-md-3">Address<span class="required"> </span></label>
    <div class="col-md-4"> 
        <?php echo Form::textarea('address',null, ['class' => 'form-control','data-required'=>1,'rows'=>3,'cols'=>5]); ?> 
        
        <span class="help-block"><?php echo e($errors->first('address', ':message')); ?></span>
    </div>
</div> 
    
    
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
          <?php echo Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']); ?>



           <a href="<?php echo e(route('contact')); ?>">
<?php echo Form::button('Back', ['class'=>'btn btn-warning text-white']); ?> </a>
        </div>
    </div>
</div>


<style type="text/css">
    ul.multiselect-container.dropdown-menu li {
    margin-left: 25px !important;
}
</style>