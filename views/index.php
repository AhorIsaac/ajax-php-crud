<!DOCTYPE html>
<html>

<head>
    <title> Webpage Title </title>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../public/styles/solar-bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="../public/font-awesome/css/all.css" type="text/css" rel="stylesheet">
    <title> PHP AJAX CRUD </title>
    <style>
    </style>
    <!-- css files -->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">PHP OOP PDO AJAX CRUD TUTORIAL</h1>
                <hr style="color:white; background-color: white; height: 1px;" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 mx-auto">
                <form action="" method="POST" id="form">
                    <div id="result"></div>
                    <div class="form-group">
                        <label for="title"> Title </label>
                        <input type="text" name="title" id="title" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="description"> Description </label>
                        <textarea id="description" name="description" class="form-control" cols="" rows="3">
                            </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary" id='submit'>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-1">
                <div id="show"></div>
                <div id="fetch"></div>
            </div>
        </div>


        <!-- Read Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Read Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="read_data"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Edit Record </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="edit_data"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update"> Update </button>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- js scripts -->
    <script src="../public/scripts/jquery-3.5.1.js"> </script>
    <script src="../public/scripts/popper.min.js"> </script>
    <script src="../public/js/bootstrap.min.js"> </script>
    <script src="../public/font-awesome/js/all.min.js"> </script>
    <script>
        $(document).on("click", "#submit", function(e) {
            e.preventDefault();

            var title = $("#title").val();
            var description = $("#description").val();
            var submit = $("#submit").val();

            $.ajax({
                url: "insert.php",
                type: "post",
                data: {
                    title: title,
                    description: description,
                    submit: submit
                },
                success: function(data) {
                    fetch();
                    $("#result").html(data);
                }
            });

            $("#form")[0].reset();
        });

        function fetch() {
            $.ajax({
                url: "fetch.php",
                type: "post",
                success: function(data) {
                    $("#fetch").html(data);
                }
            });
        }

        fetch();

        // Delete Record 
        $(document).on("click", "#del", function(e) {
            e.preventDefault();

            if (window.confirm("do you want to delete this record?")) {

                var del_id = $(this).attr("value");

                $.ajax({
                    url: "del.php",
                    type: "post",
                    data: {
                        del_id: del_id
                    },
                    success: function(data) {
                        fetch();
                        $("#show").html(data);
                    }
                });
            } else {
                return false;
            }

        });

        // Read 
        $(document).on("click", "#read", function(e) {
            e.preventDefault();

            var read_id = $(this).attr("value");

            $.ajax({
                url: "read.php",
                type: "post",
                data: {
                    read_id: read_id
                },
                success: function(data) {
                    $("#read_data").html(data);
                }
            });
        });

        // Edit Record 
        $(document).on("click", "#edit", function(e) {
            e.preventDefault();

            var edit_id = $(this).attr("value");

            $.ajax({
                url: "edit.php",
                type: "post",
                data: {
                    edit_id: edit_id
                },
                success: function(data) {
                    $("#edit_data").html(data);
                }
            });
        });

        // Update Record 
        $(document).on("click", "#update", function(e) {
            e.preventDefault();

            var edit_title = $("#edit_title").val();
            var edit_description = $("#edit_description").val();
            var update = $("#update").val();
            var edit_id = $("#edit_id").val();

            $.ajax({
                url: "update.php",
                type: "post",
                data: {
                    edit_id: edit_id,
                    edit_title: edit_title,
                    edit_description: edit_description,
                    update: update
                },
                success: function(data) {
                    fetch();
                    $("#show").html(data);
                }
            })
        })
    </script>
</body>

</html>