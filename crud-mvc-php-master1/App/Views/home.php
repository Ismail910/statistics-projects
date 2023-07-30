<?php include(VIEWS . 'inc' . DS . 'header.php'); ?>

<style>
  body {
    color: white;
    font-weight: bold;
    background: rgb(135, 185, 200);
    background: linear-gradient(90deg, rgba(135, 185, 200, 0.9864320728291317) 12%, rgba(165, 232, 184, 1) 48%, rgba(14, 70, 10, 0.989233193277311) 100%);
  }

  .imging {
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

<!-- style="background-image: url('<?php echo BURL . 'assets/images/img2.jpg'; ?>'); background-size: cover; background-position: center;opacity:.7;" -->
<div class="jumbotron pt-5 pb-5 position-relative">

  <div class="container">
    <div class="row mb-5 d-flex justify-content-center">
      <div class="col-md-6 col-12">
        <h1 class="display-4">مرحبا</h1>
        <p class="lead">الاحصائيات</p>
      </div>
      <div class="col-md-6 col-12 ">
        <img src="<?php echo BURL . 'assets/images/img2.jpg'; ?>" width="100%" height="400px" alt=""
          style="border-radius:30px; " class="imging">
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <p style="">الاحصائيات الاشخاص المقبولين</p>
      <div class="col-12 col-md-4 mb-2 mt-3">
        <p>عدد للذين تم :
          <?php echo $passCount; ?>
        </p>
      </div>
      <div class="col-12 col-md-4 mb-2 mt-3">
        <p>عدد الذين لم يتم:
          <?php echo $notPassCount; ?>
        </p>
      </div>
      <div class="col-12 col-md-4 mb-2 mt-3">
        <p>عدد الذين تخطو تاريخ الانتهاء:
          <?php echo $endDateCount; ?>
        </p>
      </div>
      <!-- Progress bar for "النسبه المئويه للذين اجتازو" -->
      <div class="col-12 col-md-4 mb-2 mt-3">
        <p>النسبه المئويه للذين تم :
          <?php echo $passPercentage; ?>% تم
        </p>
        <div class="progress-bar">
          <div class="progress-fill" style="width: <?php echo $passPercentage; ?>%;"></div>
        </div>
      </div>

      <!-- Progress bar for "النسبه المئويه للذين لم يجتاز" -->
      <div class="col-12 col-md-4 mb-2 mt-3">
        <p>النسبه المئويه للذين لم يتم :
          <?php echo $notPassPercentage; ?>% لم يتم
        </p>
        <div class="progress-bar">
          <div class="progress-fill" style="width: <?php echo $notPassPercentage; ?>%;"></div>
        </div>
      </div>

      <!-- Progress bar for "النسبه المئويه للذين تخطو تاريخ الانتهاء" -->
      <div class="col-12 col-md-4 mb-2 mt-3">
        <p>النسبه المئويه للذين تخطو تاريخ الانتهاء :
          <?php echo $endDatePercentage; ?>% انتهاء
        </p>
        <div class="progress-bar">
          <div class="progress-fill" style="width: <?php echo $endDatePercentage; ?>%;"></div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Add a button or any element to trigger the toggle action -->
<button id="toggleDataButton">عرض البيانات الخاصه بالاحصائيات </button>

<!-- Wrap the divs that you want to toggle with a parent div -->
<div id="dataContainer">
  <div class="col-12 col-md-4 mb-2 mt-3" id="passDiv">
    <p>عدد للذين تم :
      <?php echo $passCount; ?>
    </p>

    <div id="passUsersData" style="display: none;">



      <table class="table">
        <thead class="thead-dark">
          <tr>
           
            <th scope="col">الاسم</th>
            <th scope="col">الرتبه </th>
            <th scope="col">الجناج او القسم</th>
            <th scope="col">الحاله</th>

          </tr>
        </thead>
        <tbody>

          <?php $i = 1; ?>
          <?php foreach ($passusers as $row): ?>
            <tr>
              <td>
                <?php echo $row['name']; ?>
              </td>
              <td>
                <?php echo $row['position']; ?>
              </td>
              <td class="text-center">
                <?php echo $row['department']; ?>
              </td>
              <td>
                <?php echo $row['status']; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-12 col-md-4 mb-2 mt-3" id="notPassDiv">
    <p>عدد الذين تخطو لم يتم:
      <?php echo $notPassCount; ?>
    </p>
   
    <div id="notPassUsersData" style="display: none;">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">الاسم</th>
            <th scope="col">الرتبه </th>
            <th scope="col">الجناج او القسم</th>
            <th scope="col">الحاله</th>
          </tr>
        </thead> <tbody>
          <?php $i = 1; ?>
          <?php foreach ($notpassusers as $row): ?>
            <tr>
              <td>
                <?php echo $row['name']; ?>
              </td>
              <td>
                <?php echo $row['position']; ?>
              </td>
              <td class="text-center">
                <?php echo $row['department']; ?>
              </td>
              <td>
                <?php echo $row['status']; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-12 col-md-4 mb-2 mt-3" id="endDateDiv">
    <p>عدد الذين تخطو تاريخ الانتهاء:
      <?php echo $endDateCount; ?>
    </p>
    <div id="endDateUsersData" style="display: none;">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">الاسم</th>
            <th scope="col">الرتبه </th>
            <th scope="col">الجناج او القسم</th>
            <th scope="col">الحاله</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($alluserswithenddatepast as $row): ?>
            <tr>
              <td>
                <?php echo $row['name']; ?>
              </td>
              <td>
                <?php echo $row['position']; ?>
              </td>
              <td class="text-center">
                <?php echo $row['department']; ?>
              </td>
              <td>
                <?php echo $row['status']; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  const dataContainer = document.getElementById("dataContainer");
  const toggleButton = document.getElementById("toggleDataButton");

  toggleButton.addEventListener("click", function ()
  {
    const isHidden = dataContainer.style.display === "none";
    dataContainer.style.display = isHidden ? "block" : "none";
  });
  function toggleUserData(dataId)
  {
    const userData = document.getElementById(dataId);
    userData.style.display = userData.style.display === "none" ? "block" : "none";
  }
  
  document.getElementById("passDiv").addEventListener("click", function ()
  {
    toggleUserData("passUsersData");
  });

  document.getElementById("notPassDiv").addEventListener("click", function ()
  {
    toggleUserData("notPassUsersData");
  });

  document.getElementById("endDateDiv").addEventListener("click", function ()
  {
    toggleUserData("endDateUsersData");
  });

</script>

<?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>