<!-- CHANGE PASSWORD TAB -->
<div class="tab-pane" id="tab_1_3">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-social-dribbble font-green"></i>
                <span class="caption-subject font-green bold uppercase">Business Info
                </span>
            </div> 
        </div>
        
            <div class="portlet-body">  
                <div class="form-group">
                    <label for="multiple" class="control-label">Nature of Business</label>
                    <select id="multiple" class="form-control select2" multiple name="businessCategoryId">
                         
                           <optgroup label="Nature of Business">
                        <?php foreach($BusinessNatureType as $key => $result): ?> 
                            <option value="<?php echo e($result->id); ?>"><?php echo e($result->title); ?></option>
                               
                        <?php endforeach; ?>
                         </optgroup>
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="multiple" class="control-label">Targeting Markets</label>
                    <select id="multiple" class="form-control select2" multiple name="targetMarketId">
                       
                        <optgroup label="Targeting Markets">
                        <?php foreach($targetMarketType as $key => $result): ?> 
                            <option value="<?php echo e($result->id); ?>"><?php echo e($result->title); ?></option>
                               
                        <?php endforeach; ?>
                         </optgroup>
                    </select>
                </div>

                <div class="form-group">
                    <label for="multiple" class="control-label">Targeting Countries/Cities/Region</label>
                    <select id="multiple" class="form-control select2" multiple name="regionId">


                             <?php foreach($countries as $key => $result): ?> 
                                 <optgroup label="<?php echo e($result->name); ?>">
                                <?php foreach($result->state as $key => $state): ?> 
                                     
                                <option value="<?php echo e($state->id); ?>"><?php echo e($result->name); ?> <?php echo e($state->name); ?></option>
                                   
                                 <?php endforeach; ?>
                                 </optgroup>
                            <?php endforeach; ?>
                       
                       
                    </select>
                </div>
            </div>
             <div class="margin-top-10">
                <button type="submit" class="btn green" value="businessInfo" name="submit"> Save Changes </button>
                <button type="submit" class="btn default"> Cancel </button>
            </div> 
  </div>
</div>