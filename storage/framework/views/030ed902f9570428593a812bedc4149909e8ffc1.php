


<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="main-title">タイムボーイ</h1>
<output class="realtime"></output>
        <h4 id="RealtimeClockArea"></h4>
    </div>
    <div class="col">
      <p class="font-weight-bolder"><?php echo e(session('message')); ?></p>
    </div>
  </div>
    <div class="row">
    <div class="col">
      <div class="d-flex justify-content-evenly">
        <form class="timestamp" action="/time/timein" method="post">
           <?php echo csrf_field(); ?>
           <button class="btn btn-info btn-lg">出勤</button>
          </form>
          <form class="timestamp" action="/time/timeout" method="post">
            <?php echo csrf_field(); ?>
            <button class="btn btn-warning btn-lg">退勤</button>
          </form>
          <a href="/time/performance">
            <button type="button" class="btn btn-success btn-lg">勤怠実績</button>
          </a>
          <a href="/time/daily">
            <button type="button" class="btn btn-primary btn-lg">日次勤怠</button>
            
          </a>
          <a href="/">
            <button type="button" class="btn btn-secondary btn-lg">戻る</button>
          
        </a>
          <?php if(Auth::user()->admin == 0): ?>
        <a href="<?php echo e(route('show')); ?>">
          <button type="button" class="btn btn-dark btn-lg">検索</button>
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    
      <?php $__currentLoopData = $itmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?php echo e($itme->user_name); ?></h5>
          
          <ul class="list-group list-group-flush">
            <li class="list-group-item">出勤時間</li>
            <li class="list-group-item"><?php echo e($itme->punchIn); ?></li>
            <li class="list-group-item">退勤</li>
            <li class="list-group-item"><?php echo e($itme->punchOut); ?></li>
            <li class="list-group-item">勤務時間</li>
            <li class="list-group-item"><?php echo e($itme->workTime); ?>時間</li>
          </ul>          
          
        </div>
      </div>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>
      

        
        
        
          
        
        

        
        
        
        
        
          
        
        
        
        
        
        
        
        
        
        
        


  










<script src="<?php echo e(asset('/js/time.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script>
  function showClock1() {
   var nowTime = new Date();
   var nowHour = nowTime.getHours();
   var nowMin  = nowTime.getMinutes();
   var nowSec  = nowTime.getSeconds();
   var msg = "現在時刻は、" + nowHour + ":" + nowMin + ":" + nowSec + " です。";
   document.getElementById("RealtimeClockArea").innerHTML = msg;
}
setInterval('showClock1()',1000);
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\test_17\laravel8_vue_calendar\resources\views/time/index.blade.php ENDPATH**/ ?>