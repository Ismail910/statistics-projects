<?php include(VIEWS . 'inc' . DS . 'header.php'); ?>
<style>
    body {
    color: white;
    font-weight: bold;
    background: rgb(135,161,200);
    background: linear-gradient(90deg, rgba(135,161,200,0.9864320728291317) 12%, rgba(165,179,232,1) 48%, rgba(17,10,70,0.989233193277311) 100%);

  }
</style>

<h1 class="text-center  my-5 py-3">نتائج البحث </h1>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto p-4 border mb-5">
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


            <div class="row mb-3">
        <div class="col-12">
            <h3>إحصائيات البحث:</h3>
            <p>عدد النتائج: <?php echo count($searchResults); ?></p>
            <p>نسبة النتائج التي تمت: <?php echo $statisticsResults['pass_percentage']; ?></p>
            <p>نسبة النتائج التي لم تتم: <?php echo $statisticsResults['not_pass_percentage']; ?></p>
           
        </div>
    </div>



            <?php if (isset($searchResults) && count($searchResults) > 0): ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">الرتبه او الوظيفه </th>
                            <th scope="col">الجناج او القسم</th>
                            <th scope="col"> الهاتف</th>
                            <th scope="col"> تاريخ البدء</th>
                            <th scope="col">تاريخ الانتهاء</th>
                            <th scope="col">الحاله</th>
                            <th scope="col">تعديل</th>
                            <th scope="col">حزف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($searchResults as $row): ?>
                            <tr>
                                <td>
                                    <?php echo $i;
                                    $i++; ?>
                                </td>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['position']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $row['department']; ?>
                                </td>
                                <td>
                                    <?php echo $row['phone_number']; ?>
                                </td>
                                <td>
                                    <?php echo $row['start_date']; ?>
                                </td>
                                <td>
                                    <?php echo $row['end_date']; ?>
                                </td>
                                <td>
                                    <?php echo $row['status']; ?>
                                </td>
                                <td>
                                    <a href="<?php url('/users/edit/' . $row['id']) ?>" class="btn btn-info">تعديل</a>
                                </td>
                                <td>
                                    <a href="<?php url('/users/delete/' . $row['id']) ?>" class="btn btn-danger">حزف</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>نتيجه البحث فارغه.</p>
            <?php endif; ?>

        </div>
    </div>
</div>




<?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>