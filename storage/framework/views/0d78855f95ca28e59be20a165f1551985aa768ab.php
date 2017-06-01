<style type="text/css">
.profile-img{
    max-width:150px;
    border: 5px solid #fff;
    border-radius: 100%;
    box-shadow: 0 2px 2px rgba(0,0,0,0.3);
    }
</style>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body text-center">
               <img class="profile-img" src="<?php echo e(asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg")); ?>">
               
               <h1><?php echo e(Auth::user()->username); ?></h1>
                <h5><?php echo e(Auth::user()->email); ?></h5>
           
                <h1>Hello <?php echo e(Auth::user()->username); ?>, comming soon</h1>
                <h5><?php echo e(Auth::user()->username); ?>(<?php echo e(Auth::user()->email); ?>)</h5> 
            
               <button class="btn btn-success">OK</button>
                
            
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


      
    

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>