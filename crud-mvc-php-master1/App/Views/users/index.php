<?php include(VIEWS.'inc'.DS.'header.php'); ?>

<style>
    /* Custom styles for search input */
    .search-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50vh; /* Adjust as needed */
    }

    .search-form {
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 20px;
        padding: 10px;
    }

    .search-form input {
        border: none;
        padding: 5px;
        font-size: 16px;
    }

    .search-form button {
        border: none;
        background-color: transparent;
        cursor: pointer;
    }
</style>
<div class="container">
<div class="search-container">
    <form action="<?php url('users/search'); ?>" method="POST" class="search-form">
        <input type="text" name="query" placeholder="ابحث بالاسم او رقم التليفون ....">
        <button type="submit"><img src="<?php echo BURL.'assets/images/search.png'; ?>" width="30px" height="30px" alt="Search Icon"></button>
    </form>
</div>
 <div class="row">
  <h1 class="text-center">عرض كل الاشخاص</h1>
        <div class="col-12">
            <?php if(isset($success)): ?>
                <h3 class="alert alert-success text-center"><?php echo $success; ?></h3>
            <?php endif; ?>
            <?php if(isset($error)): ?>
                <h3 class="alert alert-danger text-center"><?php echo $error; ?></h3>
            <?php endif; ?>
            <div class="row">
                <?php foreach($users as $row): ?>
                    <?php
                        // Calculate the difference in days between the end date and the current date
                        $endDate = strtotime($row['end_date']);
                        $currentDate = time();
                        $difference = ($endDate - $currentDate) / (60 * 60 * 24); // Convert seconds to days
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <p class="card-text">الرتبه او الوظيفه: <?php echo $row['position']; ?></p>
                                <p class="card-text">الجناج او القسم: <?php echo $row['department']; ?></p>
                                <p class="card-text">رقم التلفون: <?php echo $row['phone_number']; ?></p>
                                <p class="card-text">تاريخ البدء: <?php echo $row['start_date']; ?></p>
                                <p class="card-text" <?php if ($difference <= 7 && $difference >= 0): ?> style="background-color: red;" <?php elseif ($difference <= 14 && $difference >= 0): ?> style="background-color: yellow;" <?php endif; ?>>
                                    تاريخ الانتهاء: <?php echo $row['end_date']; ?>
                                </p>
                                <p class="card-text">الحاله: <?php echo $row['status']; ?></p>
                                <a href="<?php url('/users/edit/'.$row['id']) ?>" class="btn btn-info">تعديل</a>
                                <a href="<?php url('/users/delete/'.$row['id']) ?>" class="btn btn-danger">حذف</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include(VIEWS.'inc'.DS.'footer.php'); ?>
