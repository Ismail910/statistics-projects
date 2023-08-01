<?php include(VIEWS.'inc'.DS.'header.php'); ?>

<style>
    /* Custom styles for search input */
    .search-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 20vh; /* Adjust as needed */
    }

    body {
    color: white;
    font-weight: bold;
    background: rgb(135,161,200);
    background: linear-gradient(90deg, rgba(135,161,200,0.9864320728291317) 12%, rgba(165,179,232,1) 48%, rgba(17,10,70,0.989233193277311) 100%);
  }

    .search-form {
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 20px;
        padding: 10px;
        background-color:white;
    }

    .search-form input {
        border: none;
        padding: 5px;
        font-size: 12px;
    }

    .search-form button {
        border: none;
        background-color: transparent;
        cursor: pointer;
    }
</style>
<div class="container">
<div class="row">
<div class="search-container col-12">
    <form action="<?php url('users/search'); ?>" method="POST" class="search-form">
        <input type="text" name="query" placeholder="ابحث ....">
        <button type="submit"><img src="<?php echo BURL.'assets/images/search.png'; ?>" width="30px" height="30px" alt="Search Icon"></button>
    </form>
</div>
<div class="col-12">
  <h1 class="text-center mt-2">عرض كل الاشخاص</h1>
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
                                <p class="card-text">الرتبه  : <?php echo $row['position']; ?></p>
                                <p class="card-text">الجناح / القسم :<?php echo $row['department']; ?></p>
                                <p class="card-text">الهاتف : <?php echo $row['phone_number']; ?></p>
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
</div>

<?php include(VIEWS.'inc'.DS.'footer.php'); ?>
