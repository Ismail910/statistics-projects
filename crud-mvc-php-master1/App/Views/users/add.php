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
                    <label for="position">الرتبه</label>
                    <input type="text" required name="position" class="form-control" id="position">
                </div>
                <div class="form-group">
                    <label for="department">الجناح</label>
                    <input type="text" required class="form-control" name="department" id="department">
                </div>



                <div class="form-group">
                    <label for="phone_number">رقم الهاتف< </label>
                    <input type="text" required class="form-control" name="phone_number" id="phone_number">
                </div>

                <div class="form-group">
                    <label for="start_date">تاريخ البدء  </label>
                    <input type="date" required class="form-control" name="start_date" id="start_date">
                </div>
                <div class="form-group">
                    <label for="end_date">تاريخ الانتهاء  </label>
                    <input type="date" required class="form-control" name="end_date" id="end_date">
                </div>
                <div class="form-group">
                    <label for="status">الحاله</label>
                    <select name="status" required class="form-control" id="status">
                        <option value="pass">تم</option>
                        <option value="not pass">لم يتم< </option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">حفظ</button>
            </form>

        </div>
    </div>
</div>

<?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>