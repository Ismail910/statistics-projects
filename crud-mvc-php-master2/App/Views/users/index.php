<?php  include(VIEWS.'inc'.DS.'header.php'); ?>


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
    background: rgb(11,16,139);
    background: linear-gradient(90deg, rgba(11,16,139,1) 13%, rgba(33,2,128,1) 48%, rgba(2,2,36,1) 100%);
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
<!-- Search form -->
<div class="container">
<div class="row d-flex justify-content-center">
<div class="search-container col-5">
    <form action="<?php url('users/search'); ?>" method="POST" class="search-form">
        <input type="text" name="query" placeholder="ابحث ....">
        <button type="submit"><img src="<?php echo BURL.'assets/images/search.png'; ?>" width="30px" height="30px" alt="Search Icon"></button>
    </form>
</div>

<div class="search-container col-5">
    <form action="<?php url('users/searchByCountry'); ?>" method="POST" class="search-form">
        <input type="text" name="query" placeholder=" ابحث بالدولة">
        <button type="submit"><img src="<?php echo BURL.'assets/images/search.png'; ?>" width="30px" height="30px" alt="Search Icon"></button>
    </form>
</div>

</div>
    
<h1 class="text-center  my-5 py-3">عرض البيانات الشخص  </h1>

<div class="container">
    <div class="row">
        <div class="col-11 mx-auto p-4 border mb-5">
                <?php if(isset($success)): ?>
                    <h3 class="alert alert-success text-center"><?php  echo $success; ?></h3>
                <?php endif; ?>
                <?php if(isset($error)): ?>
                    <h3 class="alert alert-danger text-center"><?php  echo $error; ?></h3>
                <?php endif; ?>
                <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col ">الاسم</th>
            <th scope="col"> رقم الهويه او رقم الاقامه</th>
            <th scope="col">الجنسيه</th>
            <th scope="col">اسم الشركه او المؤسسه</th>
            <th scope="col"> تاريخ البدء</th>
            <th scope="col">تاريخ الانتهاء</th>
            <th scope="col">تعديل</th>
            <th scope="col">حذف</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        <?php foreach($users as $row): ?>
            <?php
                       
                        $endDate = strtotime($row['end_date']);
                        $currentDate = time();
                        $difference = (($endDate - $currentDate) / (60 * 60 * 24))+2; 
            ?>
            <tr >
                <td><?php echo $i; $i++; ?></td>
                <td class=" fs-5">
                    <a href="<?php  url('users/detail/' .$row['id']);  ?>"  style="color: black; text-decoration: none; " > 
                    <?php  echo $row['name']; ?>
                </a>   
            </td>
                <td><?php echo $row['ssn']; ?></td>
                <td><?php echo $row['nationality']; ?></td>
                <td class="text-center"><?php echo $row['company']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
               
                <td <?php if ($difference <= 14 && $difference >= 0): ?> style="background-color: red;" <?php elseif ($difference <= 30 && $difference >= 15): ?> style="background-color: yellow;" <?php elseif ($difference < 0 ): ?> style="background-color: black; color:white;" <?php endif; ?>>
                    <?php echo $row['end_date']; ?>
                </td>

               
                <td>
                    <a href="<?php url('/users/edit/'.$row['id']) ?>" class="btn btn-warning">نعديل</a>
                </td>
                <td>
                    <a href="<?php url('/users/delete/'.$row['id']) ?>" class="btn btn-danger">حذف</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



        </div>
    </div>
</div>
    </div>
</div>



<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>
