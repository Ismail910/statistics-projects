<?php include(VIEWS . 'inc' . DS . 'header.php'); ?>

<style>
    body {
    color: white;
    font-weight: bold;
    background: rgb(135,161,200);
    background: linear-gradient(90deg, rgba(135,161,200,0.9864320728291317) 12%, rgba(165,179,232,1) 48%, rgba(17,10,70,0.989233193277311) 100%);

  }
</style>

<h1 class="text-center mt-5 mb-2 py-3">اضافة بيانات شخص جديد</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <?php if (isset($success)): ?>
                <div class="alert alert-success text-center mb-4">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger text-center mb-4">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form class="p-4 border rounded-lg shadow-sm" method="POST" action="<?php url('users/store'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">الاسم</label>
                    <input type="text" required name="name" class="form-control" id="name">
                </div>

                <div class="form-group">
                    <label for="position">الرتبة</label>
                    <input type="text" required name="position" class="form-control" id="position">
                </div>

                <div class="form-group">
                    <label for="department">الجناح / القسم</label>
                    <input type="text" required class="form-control" name="department" id="department">
                </div>

                <div class="form-group">
                    <label for="Job_ID">الرقم الوظيفي </label>
                    <input type="text" required class="form-control" name="Job_ID" id="Job_ID">
                </div>

              

                <div class="form-group">
                    <label for="start_date">تاريخ البدء</label>
                    <input type="date" required class="form-control" name="start_date" id="start_date">
                </div>

                <div class="form-group">
                    <label for="end_date">تاريخ الانتهاء</label>
                    <input type="date" required class="form-control" name="end_date" id="end_date">
                </div>

                <div class="form-group">
                    <label for="status">الحالة</label>
                    <select name="status" required class="form-control" id="status">
                        <option value="pass">تم</option>
                        <option value="not pass">لم يتم</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="reasonOFRequest"> سبب الطلب</label>
                    <input type="text" required class="form-control" name="reasonOFRequest" id="reasonOFRequest">
                </div>
                <div class="form-group">
                     <label for="profile_picture">صورة الملف الشخصي</label>
                     <input type="file"  name="profile_picture" class="form-control" id="profile_picture">
                </div>

                <div class="text-center mt-3">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg w-50">حفظ</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>
