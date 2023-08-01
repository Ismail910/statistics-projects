<?php include(VIEWS . 'inc' . DS . 'header.php'); ?>
<style>
  body {
    color: white;
    font-weight: bold;
    background: rgb(11,16,139);
    background: linear-gradient(90deg, rgba(11,16,139,1) 13%, rgba(33,2,128,1) 48%, rgba(2,2,36,1) 100%);
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

            <?php if (isset($searchResults) && count($searchResults) > 0): ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">رقم الهويه</th>
                            <th scope="col"> الجنسيه </th>
                            <th scope="col"> الشركه </th>
                            <th scope="col"> تاريخ البدء</th>
                            <th scope="col">تاريخ الانتهاء</th>
                           
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
                              
                                <td class="text-center">
                                    <?php echo $row['ssn']; ?>
                                </td>
                                <td>
                                    <?php echo $row['nationality']; ?>
                                </td>
                                <td>
                                    <?php echo $row['company']; ?>
                                </td>
                                <td>
                                    <?php echo $row['start_date']; ?>
                                </td>
                                <td>
                                    <?php echo $row['end_date']; ?>
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