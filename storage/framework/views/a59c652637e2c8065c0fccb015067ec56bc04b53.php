<?php $__env->startSection('action-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new employee</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('client-management.store')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                          <div class="form-group<?php echo e($errors->has('firstname') ? ' has-error' : ''); ?>">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="<?php echo e(old('firstname')); ?>" required autofocus>

                                 <?php if($errors->has('firstname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('firstname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                         </div>  
                        
                         <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
                              <label for="lastname" class="col-md-4 control-label">Last Name</label>

                                  <div class="col-md-6">
                                  <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname')); ?>" required>

                                      <?php if($errors->has('lastname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                            <label for="emaail" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('address')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('age') ? ' has-error' : ''); ?>">
                            <label for="tel" class="col-md-4 control-label">Tel</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control" name="tel" value="<?php echo e(old('tel')); ?>" required>

                                <?php if($errors->has('tel')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tel')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                       </div>
                        
                       <div class="form-group">
                            <label class="col-md-4 control-label">Cité</label>
                            <div class="col-md-6">
                                <select class="form-control" name="city_id">
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->id); ?>"> <?php echo e($city->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                </select>
                           </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Gouvernorat</label>
                             <div class="col-md-6">
                                <select class="form-control" name="state_id">
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                             </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pays</label>
                            <div class="col-md-6">
                                <select class="form-control" name="country_id">
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label" >Picture</label>
                            <div class="col-md-6">
                               <input type="file" id="picture" name="picture" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('clients-mgmt.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>