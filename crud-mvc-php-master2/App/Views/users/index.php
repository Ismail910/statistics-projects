<?php  include(VIEWS.'inc'.DS.'header.php'); ?>


<!-- Search form -->
<form action="<?php  url('users/search'); ?>" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="query" placeholder="Search by name, position, or department">
    </div>
    <button type="submit" class="btn btn-primary">بحث</button>
</form>

<h1 class="text-center  my-5 py-3">عرض كل الاشخاص  </h1>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto p-4 border mb-5">
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
                            <th scope="col">الاسم</th>
                            <th scope="col"> رقم الهويه او رقم الاقامه<</th>
                            <th scope="col">الجنسيه</th>
                            <th scope="col">اسم الشركه او المؤسسه<</th>
                            <th scope="col"> تاريخ البدء</th>
                            <th scope="col">تاريخ الانتهاء</th>
                            <th scope="col">تعديل</th>
                            <th scope="col">حزف</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i=1; ?>
                    <?php foreach($users as $row): ?>
                        <tr>
                            <td> <?php echo $i; $i++; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['id_number']; ?></td>
                            <td><?php echo $row['nationality']; ?></td>
                            <td class="text-center"><?php echo $row['company']; ?></td>
                           
                            <td><?php echo $row['start_date']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
                           
                            <td>
                                <a href="<?php url('/users/edit/'.$row['id']) ?>" class="btn btn-info" >نعديل</a>
                            </td>
                            <td>
                                <a href="<?php url('/users/delete/'.$row['id']) ?>" class="btn btn-danger" >حزف</a>
                            </td>
                        </tr>
                    <?php  endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>
