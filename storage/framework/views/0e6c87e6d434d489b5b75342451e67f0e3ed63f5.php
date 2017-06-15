<?php $__env->startSection('action-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new devis</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('devis-management.update', ['id' => $devis->id])); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <?php echo e(csrf_field()); ?>

                          <div class="form-group<?php echo e($errors->has('tel') ? ' has-error' : ''); ?>">
                            <label for="tel" class="col-md-4 control-label">Tel</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control" name="tel" value="<?php echo e($devis->tel); ?>" required autofocus>

                                 <?php if($errors->has('tel')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tel')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                         </div>  
                        
                     
                        <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                            <label for="emaail" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e($devis->email); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Situation</label>
                             <div class="col-md-6">
                                <select id="situation" class="form-control" name="situation">
                                        <option>décés</option>
										 <option>non décés</option>
                                </select>
                            </div>
                        </div>
						    <div class="form-group">
                            <label class="col-md-4 control-label">ville de décès</label>
                            <div class="col-md-6">
                                <select id="ville_de_deces" class="form-control" name="ville_de_deces">
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       
                                        <option value="<?php echo e($city->id); ?>"> <?php echo e($city->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                </select>
                            </div>
                           </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Date de décès</label>
                             <div class="col-md-6">
                                <input id="date_de_deces" type="date" class="form-control" name="date_de_deces" value="<?php echo e($devis->date_de_deces); ?>" required>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="col-md-4 control-label">lieu de décès</label>
                            <div class="col-md-6">
                                <select id="lieu_de_deces" class="form-control" name="lieu_de_deces">
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?>  </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                </select>
                            </div>
                            </div>
                        
                        	<div class="form-group">
                            <label class="col-md-4 control-label">Mode de sepulture</label>
                             <div class="col-md-6">
                                <select id="mode_de_sepulture" class="form-control" name="mode_de_sepulture">
                                         
                                         <option><?php echo e($devis->mode_de_sepulture); ?></option>
                                         <option>inhumation</option>
										 <option>crémation</option>
                                         <option>rapatriement</option>
                                </select>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-md-4 control-label">Déstination de défunt</label>
                            <div class="col-md-6">
                                <select id="destination_de_defunt" class="form-control" name="destination_de_defunt">
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>"> <?php echo e($country->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                </select>
                            </div>
                           </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Céremonie</label>
                             <div class="col-md-6">
                                <select id="ceremonie" class="form-control" name="ceremonie">
                                         
                                         <option><?php echo e($devis->ceremonie); ?> </option>
                                         <option>aucune ceremonie</option>
                                         <option>ceremonie musulmane</option>
										 <option>ceremonie catholique</option>
                                         <option>ceremonie juive</option>
                                </select>
                            </div>
                        </div>
                       <!-- <div class="form-group">
                            <label class="col-md-4 control-label">Options</label>
                             <div class="col-md-6">
                            
                                      <label>
                                       <input type="checkbox" id="faire-part" value="faire-part">
                                       faire-part
                                       </label>
                                 
                                     <label><input type="checkbox" id="toilette mortuaire" value="toilette mortuaire">
                                     toilette mortuaire
                                     </label>
                                     
                                     
                                     <label>
                                       <input type="checkbox" id="parution presse" value="parution presse">
                                      parution presse
                                       </label>
                                       <label>
                                       <input type="checkbox" id="soins de conservation" value="soins de conservation">
                                       soins de conservation
                                       </label>
                        
                            </div>
                            </div>
                        -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Options</label>
                             <div class="col-md-6">
                                <select id="option" class="form-control" name="option">
                                         
                                         <option><?php echo e($devis->option); ?> </option>
                                         <option>faire-part</option>
                                         <option>toilette mortuaire</option>
										 <option>parution presse</option>
                                         <option>soins de conservation</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                            <label for="observation" class="col-md-4 control-label">Observations</label>

                            <div class="col-md-6">
                                <input id="obervation" type="textarea" class="form-control" name="observation" value="<?php echo e($devis->observation); ?>" required>

                               
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                     <button type="submit" class="btn btn-primary">
                                       Update
                                     </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery.js"></script>
   <?php echo $__env->make('flashy::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('devis-mgmt.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>