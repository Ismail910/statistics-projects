<?php include(VIEWS . 'inc' . DS . 'header.php'); ?>

<h1 class="text-center  mt-5 mb-2 py-3"> اضافه  بيانات شخص جديد </h1>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">


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
                    <label for="id_number"> رقم الهويه او رقم الاقامه </label>
                    <input type="text" required class="form-control" name="id_number" id="id_number">
                </div>

                <div class="form-group">
                    <label for="start_date">تاريخ البدء  </label>
                    <input type="date" required class="form-control" name="start_date" id="start_date">
                </div>
                <div class="form-group">
                    <label for="end_date">تاريخ الانتهاء  </label>
                    <input type="date" required class="form-control" name="end_date" id="end_date">
                </div>
               
                <button type="submit" name="submit" class="btn btn-primary">حفظ</button>
            </form>

        </div>
    </div>
</div>

<?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>