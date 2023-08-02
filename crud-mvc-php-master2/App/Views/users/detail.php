<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

<style>
   
.testimonial-card .card-up {
  height: 120px;
  overflow: hidden;
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem;
}

.aqua-gradient {
  background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
}

.testimonial-card .avatar {
  width: 120px;
  margin-top: -60px;
  overflow: hidden;
  border: 5px solid #fff;
  border-radius: 50%;
}
</style>

<?php $i=1; ?>
       
       <?php
                   $endDate = strtotime($user['end_date']);
                   $currentDate = time();
                   $difference = (($endDate - $currentDate) / (60 * 60 * 24))+2; 
       ?>




<div class="container">
  <section class="mx-auto my-5" style="max-width: 23rem;">
      
    <div class="card testimonial-card mt-2 mb-3">
      <div class="card-up aqua-gradient"></div>
      <div class="avatar mx-auto white">
        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2831%29.jpg" class="rounded-circle img-fluid"
          alt="woman avatar">
      </div>
      <div class="card-body text-center">
        <h4 class="card-title font-weight-bold"> الاسم: <?php  echo $user['name']; ?> </h4>
        <hr>    
        <p>رقم الهويه او رقم الاقامه: <?php echo $user['ssn']; ?></p>
        <p>الجنسيه:<?php echo $user['nationality']; ?></p>
        <p>اسم الشركه او المؤسسه:<?php echo $user['company']; ?></p>
        <p>الديانه:<?php echo $user['religion']; ?></p>
        <p>رقم الهاتف:<?php echo $user['phone_number']; ?></p>
        <p>هاتف المسؤول :<?php echo $user['administrator_phone']; ?></p>
        <p> تاريخ البدء :<?php echo $user['start_date']; ?></p>
        <p <?php if ($difference <= 14 && $difference >= 0): ?>style="background-color: red;" <?php elseif ($difference <= 30 && $difference >= 15): ?>style="background-color: yellow;" <?php elseif ($difference < 0): ?>style="background-color: black; color:white;" <?php endif; ?>>تاريخ الانتهاء:
    <?php echo $user['end_date']; ?>
</p>

      </div>
    </div>
    
  </section>
</div>









<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>
