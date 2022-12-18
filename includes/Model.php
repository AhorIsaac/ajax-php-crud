<?php 

class Model 
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "ajax_php_crud";
    private $conn;
    
    public function __construct()
    {
        try
        {
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->username,
             $this->password);
        }
        catch(PDOException $e)
        {
            echo "Connection failed : " . $e->getMessage();
        }
    }

    public function insert()
    {
        if(isset($_POST["submit"]))
        {
            if(isset($_POST["title"]) && isset($_POST["description"]))
            {
                if(!empty($_POST["title"]) && !empty($_POST["description"]))
                {
                    $title = $_POST["title"];
                    $description = $_POST["description"];

                    $query = "INSERT INTO records(`title`, `description`) VALUES('$title', '$description') ";

                    if($sql = $this->conn->exec($query))
                    {
                        echo '
                        <div class="alert alert-success text-center alert-dismissible fade show" style="font-family: monospace; display: inline-block;">
                            <button class="close" data-dismiss="alert"> 
                                <span class="fa fa-times-circle"></span> 
                            </button>
                            <h6 class="alert-heading"> Record Added Successfully!  </h6>
                        </div>
                        ';
                    }
                    else 
                    {
                        echo 
                        '<div class="alert alert-danger text-center alert-dismissible fade show" style="font-family: monospace; display: inline-block;">
                            <button class="close" data-dismiss="alert"> 
                                <span class="fa fa-times-circle"></span> 
                            </button>
                            <h6 class="alert-heading"> Failed to add record!  </h6>
                        </div>
                        ';
                    }
                }
                else 
                {
                    echo '
                    <div class="alert alert-danger text-center alert-dismissible fade show" style="font-family: monospace; display: inline-block;">
                        <button class="close" data-dismiss="alert"> 
                            <span aria-hidden="true">&times;</span> 
                        </button>
                        <h6 class="alert-heading"> Empty Fields  </h6>
                        <p class="">  </p>
                    </div>
                    ';
                }
            }
        }
    }

    public function fetch()
    {
        $data = null;

        $stmt = $this->conn->prepare("SELECT * FROM records");

        $stmt->execute();

        $data = $stmt->fetchAll();

        return $data;
    }

    public function del($del_id)
    {
        $query = "DELETE FROM records WHERE id = '$del_id' ";
        
        if($sql = $this->conn->exec($query))
        {
            echo '
            <div class="alert alert-success text-center alert-dismissible fade show" style="font-family: monospace; display: inline-block;">
                <button class="close" data-dismiss="alert"> 
                    <span class="fa fa-times-circle"></span> 
                </button>
                <h6 class="alert-heading"> Record Deleted Successfully!  </h6>
            </div>
            ';
        }
        else 
        {
            echo '
            <div class="alert alert-danger text-center alert-dismissible fade show" style="font-family: monospace; display: inline-block;">
                <button class="close" data-dismiss="alert"> 
                    <span class="fa fa-times-circle"></span> 
                </button>
                <h6 class="alert-heading"> Not Deleted!  </h6>
            </div>
            ';
        }
    }

    public function read($read_id)
    {
        $data = null;

        $stmt = $this->conn->prepare("SELECT * FROM records WHERE id = '$read_id' ");

        $stmt->execute();

        $data = $stmt->fetch();

        return $data;
    }

    public function edit($edit_id)
    {
        $data = null;

        $stmt = $this->conn->prepare("SELECT * FROM records WHERE id = '$edit_id' ");

        $stmt->execute();

        $data = $stmt->fetch();

        return $data;

    }

    public function update($data)
    {
        $query = "UPDATE records SET `title` = '$data[edit_title]', `description` = '$data[edit_description]' WHERE id = '$data[edit_id]' ";

        if($sql = $this->conn->exec($query))
        {
            echo '
            <div class="alert alert-success text-center alert-dismissible fade show" style="font-family: monospace; display: inline-block;">
                <button class="close" data-dismiss="alert"> 
                    <span class="fa fa-times-circle"></span> 
                </button>
                <h6 class="alert-heading"> Record Updated Successfully!  </h6>
            </div>

            <script>
                $("#editModal").modal("hide");
            </script>
            ';
        }
        else 
        {
            echo '
            <div class="alert alert-danger text-center alert-dismissible fade show" style="font-family: monospace; display: inline-block;">
                <button class="close" data-dismiss="alert"> 
                    <span class="fa fa-times-circle"></span> 
                </button>
                <h6 class="alert-heading"> Record failed to Update! </h6>
            </div>
            ';
        }
    }
}

?>