<?php  include(VIEWS.'inc'.DS.'header.php'); ?>
<style>
  body {
    color: white;
    font-weight: bold;
    background: rgb(11,16,139);
    background: linear-gradient(90deg, rgba(11,16,139,1) 13%, rgba(33,2,128,1) 48%, rgba(2,2,36,1) 100%);
  }
</style>
<h1 class="text-center  mt-5 mb-2 py-3">تعديل علي بيانات الشخص </h1>

<div class="container">
    <div class="row justify-content-center">
            <div class="col-6">


            
                <?php if(isset($success)): ?>
                    <h3 class="alert alert-success text-center"><?php  echo $success; ?></h3>
                <?php endif; ?>
                <?php if(isset($error)): ?>
                    <h3 class="alert alert-danger text-center"><?php  echo $error; ?></h3>
                <?php endif; ?>

                

                <form class="p-5 border mb-5" method="POST" action="<?php url('users/update'); ?>">
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" required value="<?php echo $row['name']; ?>" name="name" class="form-control" id="name" >
                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                    </div>

                   

                    <div class="form-group">
                        <label for="nationality">الجنسيه </label>
                        <input type="text" required class="form-control" value="<?php echo $row['nationality']; ?>" name="nationality" id="nationality">
                    </div>

                    <div class="form-group">
                        <label for="company">اسم الشركه او المؤسسه </label>
                        <input type="text" required class="form-control" value="<?php echo $row['company']; ?>" name="company" id="company">
                    </div>

                    <div class="form-group">
                        <label for="ssn">رقم الهويه او الاثامه </label>
                        <input type="text" required class="form-control" value="<?php echo $row['ssn']; ?>" name="ssn" id="ssn">
                    </div>

                    <div class="form-group">
                        <label for="start_date">تاريخ البدء </label>
                        <input type="date" required class="form-control" value="<?php echo $row['start_date']; ?>" name="start_date" id="start_date">
                    </div>

                  
                    <div class="form-group">
                        <label for="end_date">تاريخ الانتهاء </label>
                        <input type="date" required class="form-control" value="<?php echo $row['end_date']; ?>" name="end_date" id="end_date">
                    </div>

                    <div class="text-center mt-3">
                     <button type="submit" name="submit" class="btn btn-primary w-50 ">تعديل</button>
                    </div>              
              </form>
                            
            </div>
        </div>
    </div>

<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>
