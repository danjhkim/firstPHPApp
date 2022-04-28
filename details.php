<?php 
    include('./config/db_connect.php');
    
    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        $sql = "SELECT * FROM pizzas WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        //fetches one result opposed to fetch all
        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);

        mysqli_close($conn);
    }


    if(isset($_POST['delete'])) {

        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            echo 'query error: '. mysqli_error($conn);
        }
        mysqli_close($conn);
    }
 

?>
<!DOCTYPE html>
<html>
<?php include "./templates/header.php"?>

<h4 class="center grey-text">Details</h4>

<div class="container center grey-text">
    <?php if($pizza): ?>
    <h4><?php echo strtoupper($pizza['title']); ?></h4>
    <p>Created by <?php echo $pizza['email']; ?></p>
    <p><?php echo date($pizza['created_at']); ?></p>
    <h5>Ingredients:</h5>
    <p><?php echo $pizza['ingredients']; ?></p>

    <!-- DELETE FORM -->
    <div class="container">
        <div class="menuBlock">
            <form action="details.php" class="hiddenForm" method="POST">
                <!-- we need two because each input gives a value to $_POST (it uses the name and value) -->
                <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
                <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
            </form>
            <div class="col s6"><a href="index.php" class="btn brand z-depth-0 buttonBack">Back</a></div>
        </div>
    </div>




    <?php else: ?>
    <h5>No such pizza exists.</h5>
    <?php endif ?>

</div>



<?php include "./templates/footer.php"?>

</html>