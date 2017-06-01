 <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      td, th {
        border: solid 2px;
        padding: 10px 5px;
      }
      tr {
        text-align: center;
      }
      .container {
        width: 100%;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <div><h2>List of hired employees from <?php echo e($searchingVals['from']); ?> to <?php echo e($searchingVals['to']); ?></h2></div>
       <table id="example2" role="grid">
            <thead>
              <tr role="row">
                <th width="20%">Name</th>
                <th width="20%">Address</th>
                <th width="10%">Age</th>
                <th width="15%">Birthdate</th>
                <th width="15%">Hired Date</th>
                <th width="10%">Department</th>
                <th width="10%">Division</th>             
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr role="row" class="odd">
                  <td><?php echo e($employee['firstname']); ?> <?php echo e($employee['middlename']); ?> <?php echo e($employee['lastname']); ?></td>
                  <td><?php echo e($employee['address']); ?></td>
                  <td><?php echo e($employee['age']); ?></td>
                  <td><?php echo e($employee['birthdate']); ?></td>
                  <td><?php echo e($employee['date_hired']); ?></td>
                  <td><?php echo e($employee['department_name']); ?></td>
                  <td><?php echo e($employee['division_name']); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
    </div>
  </body>
</html>