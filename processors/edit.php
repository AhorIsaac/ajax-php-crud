<?php 

    require_once("../includes/Model.php");

    $edit_id = $_POST["edit_id"];

    $model = new Model();

    $row = $model->edit($edit_id);

    if(!empty($row))
    {
        ?>
        <form action="" method="POST" id="form">
            <div>
                <input type="hidden" id="edit_id" value="<?php echo $row["id"] ?>" />
            </div>
            <div class="form-group">
                <label for="title"> Title </label>
                <input type="text" name="title" id="edit_title" class="form-control"
                 value="<?php echo $row['title'] ?>" />
            </div>
            <div class="form-group">
                <label for="description"> Description </label>
                <textarea id="edit_description" name="description" class="form-control" cols="" rows="3">
                <?php echo $row['description'] ?>
                </textarea>
            </div>
        </form>
    <?php     
    }

?>

