<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

<div class="jumbotron text-center mt-5">
  <h1 class="display-4">مرحبا</h1>
  <p class="lead">الاحصائيات</p>
  <hr class="my-4">
  <p>الاحصائيات الاشخاص المقبولين</p>

<p>عدد الذين تخطو تاريخ الانتهاء: <?php echo $endDateCount; ?></p>
<p> النسبه المئويه للذين تخطو تاريخ الانتهاء : <?php echo $endDatePercentage; ?>% انتهاء</p>
  
</div>

<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>
