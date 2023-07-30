<!doctype html >
<html lang="en" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300&family=Cairo:wght@300;400;900&family=Caveat&family=IBM+Plex+Sans+Arabic:wght@500&family=Noto+Sans+Arabic:wght@400;900&family=Poppins:wght@600&family=Roboto:wght@500&family=Rubik&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>STATISTICS</title>
    <style>
      *{
        font-family: 'Assistant', sans-serif;
        font-family: 'Cairo', sans-serif;
        font-family: 'Caveat', cursive;
        font-family: 'IBM Plex Sans Arabic', sans-serif;
        font-family: 'Noto Sans Arabic', sans-serif;
        font-family: 'Poppins', sans-serif;
        font-family: 'Roboto', sans-serif;
        font-family: 'Rubik', sans-serif;
      }
      /* home */
    </style>
  </head>
  <body>


  <nav class="navbar navbar-expand-lg bg-body-tertiary text-dark">
  <div class="container-fluid">
      <a class="navbar-brand" href="<?php url(); ?>">
      <img src="<?php echo BURL.'assets/images/logo.jpeg'; ?>" width="60" height="60" alt="" style="border-radius:50%;">
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
    <div class="col-7 d-flex justify-content-center">
      <ul class="navbar-nav me-auto my-2 my-lg-0 " style="--bs-scroll-height: 100px; color:black;  font-weight: 700;">
      <li class="nav-item active">
          <a class="nav-link" href="<?php url(); ?>">الصفحة الرئيسية  </a>
        </li>
       
        <li class="nav-item ">
          <a class="nav-link" href="<?php url('users/index'); ?>">المستخدمين</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php url('users/add'); ?>">اضافة مستخدم</a>
        </li>
      </ul>
    </div>
    </div>
  </div>
</nav>