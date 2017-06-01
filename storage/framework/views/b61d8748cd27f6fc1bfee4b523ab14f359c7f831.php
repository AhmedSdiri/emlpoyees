<div class="row">
  <?php 
    $index = 0;
   ?>
  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-6">
      <div class="form-group">
          <?php 
            $stringFormat =  strtolower(str_replace(' ', '', $item));
           ?>
        <label class="col-md-3 control-label"><?php echo e($item); ?></label>
        <div class="col-md-7">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" value="<?php echo e(isset($oldVals) ? $oldVals[$index] : ''); ?>" name="<?=$stringFormat?>" class="form-control pull-right" id="<?=$stringFormat?>" placeholder="<?php echo e($item); ?>" required>
            </div>
        </div>
      </div>
    </div>
  <?php 
    $index++;
   ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>