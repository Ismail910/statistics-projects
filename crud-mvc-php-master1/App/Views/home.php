<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

<style>
  body {
    color: white;
    font-weight: bold;
    background: rgb(135,185,200);
    background: linear-gradient(90deg, rgba(135,185,200,0.9864320728291317) 12%, rgba(165,232,184,1) 48%, rgba(14,70,10,0.989233193277311) 100%);
    }
    .imging{
      box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }
    .progress-bar {
    width: 80%;
    height: 20px;
    background-color: #f1f1f1;
    border-radius: 10px;
    overflow: hidden;
  }

  .progress-fill {
    height: 100%;
    width: 0;
    background-color: #4a5889;
    border-radius: 10px;
  }
</style>

<!-- style="background-image: url('<?php echo BURL.'assets/images/img2.jpg'; ?>'); background-size: cover; background-position: center;opacity:.7;" -->
<div class="jumbotron pt-5 pb-5 position-relative" >

  <div class="container">
    <div class="row mb-5 d-flex justify-content-center">
      <div class="col-md-6 col-12">
        <h1 class="display-4">مرحبا</h1>
        <p class="lead">الاحصائيات</p>
      </div>
      <div class="col-md-6 col-12 "> 
      <img src="<?php echo BURL.'assets/images/img2.jpg'; ?>" width="100%" height="400px" alt="" style="border-radius:30px; " class="imging">
      </div>
    </div>
    <div class="row d-flex justify-content-center">
    <p style="">الاحصائيات الاشخاص المقبولين</p>
    <div class="col-12 col-md-4 mb-2 mt-3">
    <p>عدد للذين تخطو تاريخ الانتهاء : <?php echo $passCount; ?></p>
    </div>
    <div class="col-12 col-md-4 mb-2 mt-3">
    <p>عدد الذين تخطو لم يتخطو: <?php echo $notPassCount; ?></p>
  </div>
  <div class="col-12 col-md-4 mb-2 mt-3">
    <p>عدد الذين تخطو تاريخ الانتهاء: <?php echo $endDateCount; ?></p>
  </div>
<!-- Progress bar for "النسبه المئويه للذين اجتازو" -->
<div class="col-12 col-md-4 mb-2 mt-3">
  <p>النسبه المئويه للذين اجتازو : <?php echo $passPercentage; ?>% اجتاز</p>
  <div class="progress-bar">
    <div class="progress-fill" style="width: <?php echo $passPercentage; ?>%;"></div>
  </div>
</div>

<!-- Progress bar for "النسبه المئويه للذين لم يجتاز" -->
<div class="col-12 col-md-4 mb-2 mt-3">
  <p>النسبه المئويه للذين لم يجتاز : <?php echo $notPassPercentage; ?>% لم يجتاز</p>
  <div class="progress-bar">
    <div class="progress-fill" style="width: <?php echo $notPassPercentage; ?>%;"></div>
  </div>
</div>

<!-- Progress bar for "النسبه المئويه للذين تخطو تاريخ الانتهاء" -->
<div class="col-12 col-md-4 mb-2 mt-3">
  <p>النسبه المئويه للذين تخطو تاريخ الانتهاء : <?php echo $endDatePercentage; ?>% انتهاء</p>
  <div class="progress-bar">
    <div class="progress-fill" style="width: <?php echo $endDatePercentage; ?>%;"></div>
  </div>
</div>
    </div>
  </div>
</div>
<?php include(VIEWS.'inc'.DS.'footer.php'); ?>

