<?php include(VIEWS . 'inc' . DS . 'header.php'); ?>
<style>
    body {
    color: white;
    font-weight: bold;
    background: rgb(135,161,200);
    background: linear-gradient(90deg, rgba(135,161,200,0.9864320728291317) 12%, rgba(165,179,232,1) 48%, rgba(17,10,70,0.989233193277311) 100%);

  }
</style>

<h1 class="text-center  mt-5 mb-2 py-3"> اضافه  بيانات شخص جديد </h1>

<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-6">


            <?php if (isset($success)): ?>
                <h3 class="alert alert-success text-center">
                    <?php echo $success; ?>
                </h3>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <h3 class="alert alert-danger text-center">
                    <?php echo $error; ?>
                </h3>
            <?php endif; ?>


            <form class="p-5 border mb-5" method="POST" action="<?php url('users/store'); ?>">

                <div class="form-group">
                    <label for="name">الاسم</label>
                    <input type="text" required name="name" class="form-control" id="name">
                </div>

                <div class="form-group">
                    <label for="nationality">الجنسيه</label>
                    <input type="text" required name="nationality" class="form-control" id="nationality">
                </div>

                <div class="form-group">
                    <label for="company">اسم الشركه او المؤسسه</label>
                    <input type="text" required class="form-control" name="company" id="company">
                </div>



                <div class="form-group">
                    <label for="ssn"> رقم الهويه او رقم الاقامه </label>
                    <input type="text" required class="form-control" name="ssn" id="ssn">
                </div>

                <div class="form-group">
                    <label for="start_date">تاريخ البدء  </label>
                    <input type="date" required class="form-control" name="start_date" id="start_date">
                </div>
                <div class="form-group">
                    <label for="end_date">تاريخ الانتهاء  </label>
                    <input type="date" required class="form-control" name="end_date" id="end_date">
                </div>
                <div class="text-center mt-3">
                <button type="submit" name="submit" class="btn btn-primary w-50">حفظ</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>