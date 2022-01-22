<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    

        <div class="container">
            <h3 class="py-5">氏名　<?php echo e($time->user_name); ?></h3>
        <form method="POST" action="<?php echo e(route('report.update',['id' =>$time->id])); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="exampleInputEmail1">出勤時間:<?php echo e($time->punchIn); ?></label>
            <input type="text" class="form-control col-4" name=punchIn value="<?php echo e($time->punchIn); ?>">
            
            
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">退勤時間:<?php echo e($time->punchOut); ?></label>
            <input type="text" class="form-control col-4" name=punchOut value="<?php echo e($time->punchOut); ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">労働時間<?php echo e($time->workTime); ?>時間</label>
            <input type="text" class="form-control col-4" name=workTime value="<?php echo e($time->workTime); ?>">
            
            
          </div>

        

           
 
        
        <input type="submit" value="更新する">
    </form>
    


<a href="<?php echo e(route('searchproduct',['id'=>$time->id])); ?>"><?php echo e(__('詳細に戻る')); ?></a>
</div>









  

  
<?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/report/edit.blade.php ENDPATH**/ ?>