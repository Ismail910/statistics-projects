<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

<style>
body{
  background: linear-gradient(90deg, rgba(11,16,139,1) 13%, rgba(33,2,128,1) 48%, rgba(2,2,36,1) 100%);
   
   }
.testimonial-card .card-up {
  height: 120px;
  overflow: hidden;
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem;
}

.aqua-gradient {
background-color:lightgray;
}

.testimonial-card .avatar {
  width: 160px;
  margin-top: -60px;
  overflow: hidden;
  border: 5px solid #fff;
  border-radius: 50%;
}
.imging{
  border-radius: 50%;
}
</style>

<?php $i=1; ?>
       
       <?php
                   $endDate = strtotime($user['end_date']);
                   $currentDate = time();
                   $difference = (($endDate - $currentDate) / (60 * 60 * 24))+2; 
       ?>




<div class="container ">
  <section class="mx-auto my-5 " style="max-width: 60rem; ">
      
    <div class="card testimonial-card mt-2 mb-3 bg-info">
      <div class="card-up "></div>
      <div class="mx-auto white">
      <?php if (!empty($user['profile_picture'])): ?>
                    <?php
                        // Convert the binary data to base64 encoding for embedding in the HTML
                        $base64Image = base64_encode($user['profile_picture']);
                        $imageSrc = 'data:image/jpeg;base64,' . $base64Image;
                    ?>
                    <div class="w-100 d-flex justify-content-center mt-3">
                    <img src="<?php echo $imageSrc; ?>" alt="<?php echo $user['name']; ?> Profile Picture" width="200px" height="200px" class="imging">
                    </div>
                <?php else: ?>
                    <!-- You can display a default profile picture if no image is available -->
                    <img src="<?php echo BURL.'assets/images/user.png'; ?>" width="200px" height="200px" alt="Default Photo" class="imging">
                <?php endif; ?>
      </div>
      <div class="card-body ">
        <p class="card-title fw-bold fs-1 text-center" style="color:darkblue"> الاسم: <?php  echo $user['name']; ?> </p>
        <hr>  
        <div class="d-flex justify-content-center row fs-5 fw-bold text-right ">
        <div class="col-5">  
        <p>رقم الهويه او رقم الاقامه: <?php echo $user['ssn']; ?></p>
        <p>الجنسيه:<?php echo $user['nationality']; ?></p>
        <p>اسم الشركه او المؤسسه:<?php echo $user['company']; ?></p>
        <p>الديانه:<?php echo $user['religion']; ?></p>
        </div>
        <div class="col-5">
        <p>رقم الهاتف:<?php echo $user['phone_number']; ?></p>
        <p>هاتف المسؤول :<?php echo $user['administrator_phone']; ?></p>
        <p> تاريخ البدء :<?php echo $user['start_date']; ?></p>

       

        <p <?php if ($difference <= 14 && $difference >= 0): ?>style="color:red ; " <?php elseif ($difference <= 30 && $difference >= 15): ?>style="color:#ffd700; " <?php elseif ($difference < 0): ?>style="color:black; " <?php endif; ?>>تاريخ الانتهاء:

    <?php echo $user['end_date']; ?>
</p>
</div>
        </div>

      </div>
    </div>
    
  </section>
</div>









<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>
