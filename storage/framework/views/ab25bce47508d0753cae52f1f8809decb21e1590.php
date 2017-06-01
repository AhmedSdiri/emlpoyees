<?php $__env->startSection('action-content'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of countries</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="<?php echo e(route('country.create')); ?>">Add new country</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="<?php echo e(route('country.search')); ?>">
         <?php echo e(csrf_field()); ?>

         <?php $__env->startComponent('layouts.search', ['title' => 'Search']); ?>
          <?php $__env->startComponent('layouts.two-cols-search-row', ['items' => ['Country_Code', 'Name'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['country_code'] : '', isset($searchingVals) ? $searchingVals['name'] : '']]); ?>
          <?php echo $__env->renderComponent(); ?>
        <?php echo $__env->renderComponent(); ?>
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="country: activate to sort column ascending">Country Code</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="country: activate to sort column ascending">Country Name</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr role="row" class="odd">
                  <td><?php echo e($country->country_code); ?></td>
                  <td><?php echo e($country->name); ?></td>
                  <td>
                    <form class="row" method="POST" action="<?php echo e(route('country.destroy', ['id' => $country->id])); ?>" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <a href="<?php echo e(route('country.edit', ['id' => $country->id])); ?>" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Update
                        </a>
                        <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Delete
                        </button>
                    </form>
                  </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
              <tr>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="country: activate to sort column ascending">Country Code</th>
                <th width="20%" rowspan="1" colspan="1">Country Name</th>
                <th rowspan="1" colspan="2">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to <?php echo e(count($countries)); ?> of <?php echo e(count($countries)); ?> entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <?php echo e($countries->links()); ?>

          </div>
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
<?php echo $__env->make('system-mgmt.country.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>