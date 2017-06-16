<?php $__env->startSection('action-content'); ?>

<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
    
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of Devis</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="<?php echo e(route('devis-management.create')); ?>">Add new devis</a>
        </div>
    </div>
   
  </div>
     <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
        
   
      <form method="POST" action="<?php echo e(route('devis-management.search')); ?>">
         <?php echo e(csrf_field()); ?>

         <?php $__env->startComponent('layouts.search', ['title' => 'Search']); ?>
          <?php $__env->startComponent('layouts.two-cols-search-row', ['items' => ['Tel','Email'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['tel'] : '',  isset($searchingVals) ? $searchingVals['email'] : '']]); ?>
          <?php echo $__env->renderComponent(); ?>
        <?php echo $__env->renderComponent(); ?>
      </form>
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="6%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">ID</th>
                <th width="6%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Tel</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Email</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Situation</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Ville de décès </th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Date de décès</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Lieu de décès</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Mode de sepulture</th>
                  <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Destination de Défunt</th>
                  <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Cérémonie</th>
                  <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Option</th>
                  <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Observations</th>
                  <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Etat</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $devis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $devi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($devi->traitement == 1): ?>
                <tr role="row" class="odd">   
                <td  class="sorting_1 bg-success text-white"><?php echo e($devi->id); ?></td>
                <td  class="hidden-xs bg-success text-white"><?php echo e($devi->tel); ?></td>
                <td  class="hidden-xs bg-success text-white"><?php echo e($devi->email); ?></td>
                <td  class="hidden-xs bg-success text-white"><?php echo e($devi->situation); ?></td>
                <td  class="hidden-xs bg-success text-white"><?php echo e($devi->ville_de_deces); ?></td>
                <td  class="hidden-xs bg-success text-white"><?php echo e($devi->date_de_deces); ?></td>
                <td  class="hidden-xs bg-success text-white"><?php echo e($devi->lieu_de_deces); ?></td>
                <td  class="hidden-xs bg-success text-white"><?php echo e($devi->mode_de_sepulture); ?></td>
                <td  class="hidden-xs bg-success text-white"><?php echo e($devi->destination_de_defunt); ?></td>
                <td  class="hidden-xs bg-success text-white"><?php echo e($devi->ceremonie); ?></td>
                <td  class="hidden-xs bg-success text-white"><?php echo e($devi->option); ?></td>
                <td  class="hidden-xs bg-success text-white"><?php echo e($devi->observation); ?></td>
                <td  class="hidden-xs bg-success text-white"> <?php if(($devi->etat) == 1): ?><button type="submit" class="btn btn-info glyphicon glyphicon-eye-open col-sm-5 col-xs-5 btn-margin"></button>
                                       <?php else: ?>
                                       <button type="submit" class="btn btn-primary glyphicon glyphicon-eye-close col-sm-5 col-xs-5 btn-margin"></button>  
                                       <?php endif; ?>
                                       <?php if(($devi->traitement) == 1): ?><button type="submit" class="btn btn-success glyphicon glyphicon-thumbs-up col-sm-5 col-xs-5 btn-margin"></button>
                                       <?php else: ?>
                                       <button type="submit" class="btn btn-warning glyphicon glyphicon-thumbs-down col-sm-5 col-xs-5 btn-margin"></button>  
                                       <?php endif; ?>
                                     
                </td >
                  <td class="bg-success text-white">
                <form class="row" method="POST" action="<?php echo e(route('devis-management.destroy', ['id' => $devi->id])); ?>" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <a href="<?php echo e(route('devis-management.show', ['id' => $devi->id])); ?>" class="btn btn-warning glyphicon glyphicon-play col-sm-2 col-xs-2 btn-margin">

                        <a href="<?php echo e(route('devis-management.edit', ['id' => $devi->id])); ?>" class="btn btn-warning glyphicon glyphicon-edit col-sm-2 col-xs-2 btn-margin">
                           
                        </a>
                         <button type="submit" class="btn btn-danger glyphicon glyphicon-trash col-sm-2 col-xs-2 btn-margin">
                          
                        </button>
                    </form>
                      
                 </td>
             </tr>
                 <?php else: ?>
                 <tr role="row" class="odd">
                 
                <td class="sorting_1"><?php echo e($devi->id); ?></td>
                <td class="hidden-xs"><?php echo e($devi->tel); ?></td>
                <td class="hidden-xs"><?php echo e($devi->email); ?></td>
                <td class="hidden-xs"><?php echo e($devi->situation); ?></td>
                <td class="hidden-xs"><?php echo e($devi->ville_de_deces); ?></td>
                <td class="hidden-xs"><?php echo e($devi->date_de_deces); ?></td>
                <td class="hidden-xs"><?php echo e($devi->lieu_de_deces); ?></td>
                <td class="hidden-xs"><?php echo e($devi->mode_de_sepulture); ?></td>
                <td class="hidden-xs"><?php echo e($devi->destination_de_defunt); ?></td>
                <td class="hidden-xs"><?php echo e($devi->ceremonie); ?></td>
                <td class="hidden-xs"><?php echo e($devi->option); ?></td>
                <td class="hidden-xs"><?php echo e($devi->observation); ?></td>
                <td class="hidden-xs"> 
                <?php if(($devi->etat) == 1): ?><button type="submit" class="btn btn-info glyphicon glyphicon-eye-open col-sm-5 col-xs-5 btn-margin"></button>
                                       <?php else: ?>
                                       <button type="submit" class="btn btn-primary glyphicon glyphicon-eye-close col-sm-5 col-xs-5 btn-margin"></button>  
                                       <?php endif; ?>
                                       <?php if(($devi->traitement) == 1): ?><button type="submit" class="btn btn-success glyphicon glyphicon-thumbs-up col-sm-5 col-xs-5 btn-margin"></button>
                                       <?php else: ?>
                                       <button type="submit" class="btn btn-warning glyphicon glyphicon-thumbs-down col-sm-5 col-xs-5 btn-margin"></button>  
                                       <?php endif; ?>
                                     
                </td>
                  <td>
                    <form class="row" method="POST" action="<?php echo e(route('devis-management.destroy', ['id' => $devi->id])); ?>" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <a href="<?php echo e(route('devis-management.show', ['id' => $devi->id])); ?>" class="btn btn-warning glyphicon glyphicon-play col-sm-2 col-xs-2 btn-margin">

                        <a href="<?php echo e(route('devis-management.edit', ['id' => $devi->id])); ?>" class="btn btn-warning glyphicon glyphicon-edit col-sm-2 col-xs-2 btn-margin">
                           
                        </a>
                         <button type="submit" class="btn btn-danger glyphicon glyphicon-trash col-sm-2 col-xs-2 btn-margin">
                          
                        </button>
                    </form>
                      
                 </td>
             </tr>
                 <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
              
            <tfoot>
              <tr role="row">
                <th width="6%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">ID</th>
                <th width="6%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Tel</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Email</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Situation</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Ville de décès </th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Date de décès</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Lieu de décès</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Mode de sepulture</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Destination de Défunt</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Cérémonie</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Option</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Observations</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Etat</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
                <div class="col-sm-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to <?php echo e(count($devis)); ?> of <?php echo e(count($devis)); ?> entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <?php echo e($devis->links()); ?>

          </div>
        </div>
      </div>

      </div>
    </div>

   <script src="//code.jquery.com/jquery.js"></script>
   <?php echo $__env->make('flashy::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('devis-mgmt.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>