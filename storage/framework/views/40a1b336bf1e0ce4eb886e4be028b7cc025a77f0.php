
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
             <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                   <?php echo $__env->make('packages::partials.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">People Of Contacts</span>
                                    </div>
                                        <div class="col-md-2 pull-right">
                                            <div class="input-group"> 
                                                <a href="<?php echo e(route('contact.create')); ?>">
                                                    <button  class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Contact</button> 
                                                </a>
                                            </div>
                                        </div> 

                                         <div class="col-md-2 pull-right">
                                            <div   class="input-group">  
                                             <a class="btn  btn-success" data-toggle="modal" href="#responsive2"><i class="fa fa-plus-circle"></i>   Import Contacts </a> 
                                            </div>
                                        </div>  
                                        
                                         <div class="col-md-2 pull-right">
                                            <div   class="input-group">  
                                              <a onclick="createGroup('<?php echo e(url("admin/createGroup")); ?>')" class="btn  btn-success  btn-outline sbold" data-toggle="modal" href="#responsive"> 
                                                <i class="fa fa-plus-circle"></i> 
                                            Create Group </a>  
                                            </div>
                                        </div>  
                                          <div class="col-md-3 pull-right">
                                            <div   class="input-group">  
                                             <a class="btn  btn-success" data-toggle="modal" href="<?php echo e(url('admin/contact?export=pdf')); ?>"><i class="fa fa-plus-circle"></i> Export Contacts to pdf </a> 
                                            </div>
                                        </div>  

                                      
                                     
                                </div>
                                  
                                    <?php if(Session::has('flash_alert_notice')): ?>
                                         <div class="alert alert-success alert-dismissable" style="margin:10px">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                          <i class="icon fa fa-check"></i>  
                                         <?php echo e(Session::get('flash_alert_notice')); ?> 
                                         </div>
                                    <?php endif; ?>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <form action="<?php echo e(route('contact')); ?>" method="get" id="filter_data">
                                             
                                            <div class="col-md-3">
                                                <input value="<?php echo e((isset($_REQUEST['search']))?$_REQUEST['search']:''); ?>" placeholder="Search " type="text" name="search" id="search" class="form-control" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" value="Search" class="btn btn-primary form-control">
                                            </div>
                                           
                                        </form>
                                         <div class="col-md-2">
                                             <a href="<?php echo e(route('contact')); ?>">   <input type="submit" value="Reset" class="btn btn-default form-control"> </a>
                                        </div>
                                       
                                        </div>
                                    </div>
                                     
                                    <table class="table table-striped table-hover table-bordered" id="contact">
                                        <thead>
                                            <tr>
                                             <th>   <INPUT type="checkbox" onchange="checkAll(this)" name="chk[]" /> All </th> 
                                             <th> Title </th>
                                                <th> Name </th>
                                                <th> Email </th> 
                                                <th> Phone </th>  
                                                <th>Created date</th> 
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($contacts as $key => $result): ?>
                                            <tr>
                                             <th> <input type="checkbox" value="<?php echo e($result->id); ?>" name="checkAll"  class="checkAll contactChk"> </th>
                                             <td> <?php echo e($result->title); ?> </td>
                                                <td> <?php echo e($result->firstName.' '.$result->lastName); ?> </td>
                                                 <td> <?php echo e($result->email); ?> </td>
                                                 <td> <?php echo e($result->phone); ?> </td> 
                                                     <td>
                                                        <?php echo Carbon\Carbon::parse($result->created_at)->format('Y-m-d');; ?>

                                                    </td>
                                                    
                                                    <td> 
                                                        <a href="<?php echo e(route('contact.edit',$result->id)); ?>">
                                                            <i class="fa fa-edit" title="edit"></i> 
                                                        </a>

                                                        <?php echo Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('contact.destroy', $result->id))); ?>

                                                        <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="<?php echo e($result->id); ?>"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                        
                                                         <?php echo Form::close(); ?>


                                                    </td>
                                               
                                            </tr>
                                           <?php endforeach; ?>
                                            
                                        </tbody>
                                    </table>
                                   

                                     <div class="center" align="center">  <?php echo $contacts->appends(['search' => isset($_GET['search'])?$_GET['search']:''])->render(); ?></div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            
            
            <!-- END QUICK SIDEBAR -->
        </div>
        
        
 <div id="responsive" class="modal fade" tabindex="-1" data-width="300">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #efeb10 !important">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Contact Group</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Contact Group Name</h4>
                        <p>
                            <input type="text" class="col-md-12 form-control" name="contact_group" id="contact_group"> </p>
                            <input type="hidden" name="contacts_id" value="">
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
            <span id="error_msg"></span>
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                <button type="button" class="btn red" id="csave"  onclick="createGroup('<?php echo e(url("admin/createGroup")); ?>','save')" >Save</button>
            </div>
        </div>
    </div>
</div>

<form id="import_contact" action="" method="post" encytype="multipart/form-data">
 <div id="responsive2" class="modal fade" tabindex="-1" data-width="300">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #efeb10 !important">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Import Contact Name</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Import Contact</h4>
                        <span id="error_msg2"></span>
                        <p>
                            <input type="file" class="col-md-12 form-control" name="importContact" id="importContact"> </p> 
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
            
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                <button type="submit" class="btn red" id="csave" >Imort</button>
            </div>
        </div>
    </div>
</div>
</form>