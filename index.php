<?php

include 'includes/db.php';

?>

<div class="container">
    <div class="jumbotron text-center">
        <h2>Crud Application Using PHP</h2>
    </div>
    <br>
    
    <a href="insert.php" role="button" class="btn btn-primary pull-right">INSERT DATA</a>
    <br>
    <br>
    <table class="table table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Batch</th>
            <th>Email</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
<?php  		            
$sql = "SELECT * FROM student WHERE is_deleted = 0 ORDER BY ID DESC";
$statement = $conn->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_OBJ);


foreach($results as $result)
{  ?>
        <tr>
            <td><?=$result->id; ?></td>
            <td><?=$result->name; ?></td>
            <td><?=$result->email; ?></td>
            <td><?=$result->batch; ?></td>
            <td>
               <img src= "<?=$result->image?>" alt="<?= $result->name ?>" class="thumbnail" width="100px" height="75px">
            </td>
            <td><a href="update.php?edit=<?=$result->id ?>" class="btn btn-success btn-sm" role="button">Update</a>
            <a href="index.php?delete=<?=$result->id ?>" class="btn btn-danger btn-sm" onClick="return confirm('Do you really want to delete');" role="button">Delete</a></td>
        </tr>
<?php
    
}        
?>

    </table>
    
</div>

<?php

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $sql = "UPDATE student SET is_deleted=? WHERE id =?";
    $statement = $conn->prepare($sql);
    $statement->execute([1,$id]);

    header("Location:index.php");
}





?>




