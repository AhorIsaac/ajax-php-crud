<?php 

require_once("../includes/Model.php");

$del_id = $_POST["del_id"];

$model = new Model();

$del = $model->del($del_id);
