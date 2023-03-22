<?php

require_once("../includes/Model.php");

$model = new Model();

$rows = $model->fetch();
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Description </th>
            <th> Action </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        if (!empty($rows)) {
            foreach ($rows as $row) {
        ?>
                <tr class="lead">
                    <td> <?php echo $i++; ?> </td>
                    <td> <?php echo $row["title"]; ?> </td>
                    <td> <?php echo $row["description"]; ?> </td>
                    <td>
                        <a href="#" id="read-<?php echo $row['id'] ?>" class="badge badge-info read-record" onclick="readRecord(<?php echo $row['id'] ?>)"> Read </a>
                        <a href="#" id="del-<?php echo $row['id'] ?>" class="badge badge-danger delete-record" onclick="deleteRecord(<?php echo $row['id'] ?>);"> Delete </a>
                        <a href="#" id="edit-<?php echo $row['id'] ?>" class="badge badge-warning edit-record" onclick="editRecord(<?php echo $row['id'] ?>)"> Edit </a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo '
            <div class="alert alert-danger text-center alert-dismissible fade show" style="font-family: monospace; display: inline-block;">
                <button class="close" data-dismiss="alert"> 
                    <span aria-hidden="true">&times;</span> 
                </button>
                <h6 class="alert-heading"> No Data!  </h6>
                <p class="">  </p>
            </div>
            ';
        }
        ?>
    </tbody>
</table>