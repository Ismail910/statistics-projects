<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

<div class="jumbotron text-center mt-5">
  <h1 class="display-4">مرحبا</h1>
  <p class="lead">الاحصائيات</p>
  <hr class="my-4">
  <p>الاحصائيات الاشخاص المقبولين</p>


  <p>Total Pass: <?php echo $passCount; ?></p>
<p>Total Not Pass: <?php echo $notPassCount; ?></p>
<p>Pass Percentage: <?php echo $passPercentage; ?>%</p>
<p>Not Pass Percentage: <?php echo $notPassPercentage; ?>%</p>
  
</div>

<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>
