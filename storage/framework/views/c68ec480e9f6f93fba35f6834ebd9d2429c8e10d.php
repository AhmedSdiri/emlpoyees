<?php $__env->startSection('action-content'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title">List of hired employees</h3>
        </div>
        <div class="col-sm-4">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('report.excel')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" value="<?php echo e($searchingVals['from']); ?>" name="from" />
                <input type="hidden" value="<?php echo e($searchingVals['to']); ?>" name="to" />
                <button type="submit" class="btn btn-primary">
                  Export to Excel
                </button>
            </form>
        </div>
        <div class="col-sm-4">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('report.pdf')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" value="<?php echo e($searchingVals['from']); ?>" name="from" />
                <input type="hidden" value="<?php echo e($searchingVals['to']); ?>" name="to" />
                <button type="submit" class="btn btn-info">
                  Export to PDF
                </button>
            </form>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="<?php echo e(route('report.search')); ?>">
         <?php echo e(csrf_field()); ?>

         <?php $__env->startComponent('layouts.search', ['title' => 'Search']); ?>
          <?php $__env->startComponent('layouts.two-cols-date-search-row', ['items' => ['From', 'To'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['from'] : '', isset($searchingVals) ? $searchingVals['to'] : '']]); ?>
          <?php echo $__env->renderComponent(); ?>
         <?php echo $__env->renderComponent(); ?>
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Employee Name</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Birthday</th>
                <th width = "40%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Address</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Hired Day</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr role="row" class="odd">
                  <td><?php echo e($employee->firstname); ?> <?php echo e($employee->middlename); ?> <?php echo e($employee->lastname); ?></td>
                  <td><?php echo e($employee->birthdate); ?></td>
                  <td><?php echo e($employee->address); ?></td>
                  <td><?php echo e($employee->date_hired); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
              <tr role="row">
                  <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Employee Name</th>
                  <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Birthday</th>
                  <th width = "40%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Address</th>
                  <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Hired Day</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to <?php echo e(count($employees)); ?> of <?php echo e(count($employees)); ?> entries</div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('system-mgmt.report.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>