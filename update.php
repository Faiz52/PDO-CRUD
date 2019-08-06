<?php
include 'includes/db.php';

if (isset($_POST['update']))
{

    $id = $_GET['edit'];

    $name         = in($_POST['name']);
    $batch        = in($_POST['batch']);
    $email        = in($_POST['email']);
    $image_name   = $_FILES['image']['name'];
    $image        = $_FILES['image']['tmp_name'];
    $location     = "images/".$image_name;


    move_uploaded_file($image, $location);


    $sql = "UPDATE student set name=?, batch=?, email=?, image=? WHERE id=?";
    $statement= $conn->prepare($sql);
    $statement->execute([$name, $batch, $email, $location,$id]);

    if($statement)
    {
        header("Location:index.php");
    }

}





// Get the userid
$id = $_GET['edit'];

$statement = $conn->prepare("SELECT * FROM student WHERE id=?");
$statement->execute([$id]); 
$result = $statement->fetch(PDO::FETCH_OBJ);

if($statement->rowCount() > 0) { ?>


<div class="container">
    <div class="jumbotron text-center">
        <h2>Crud Application Using PHP</h2>
    </div>
    <br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?= $result->name; ?>">
    </div>
    <div class="form-group">
        <label for="name">Batch:</label>
        <input type="text" name="batch" class="form-control" placeholder="Enter batch" value="<?= $result->batch; ?>">
    </div>
    <div class="form-group">
        <label for="name">Email:</label>
        <input type="text" name="email" class="form-control" placeholder="Enter email" value="<?= $result->email; ?>">
    </div>
    <div class="form-group">
        <label for="name">Image:</label>
        <img src= "<?= $result->image; ?>" alt="" width="100px" height="100px" class="thumbnail">
        <input type="file" name="image" class="btn btn-primary">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Update data" name="update">
    </div>
</form>
</div>

<?php } ?>
