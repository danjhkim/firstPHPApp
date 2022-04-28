<?php 
    include('./config/db_connect.php');


    // write query for all pizzas
    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    //make query and get results
    //! its not in a format we can use
    $result = mysqli_query($conn, $sql);

    //fetch the resulting rows as an array
    //! converts to associative array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //clear memory of result
    mysqli_free_result($result);

    //close database
    mysqli_close($conn);

    //explode creates an array from a string
    //! remember echo doesnt work for arrays use print_r
    // print_r(explode(",", $pizzas[0]['ingredients']));
    

?>
<!DOCTYPE html>
<html>
<?php include "./templates/header.php"?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">
        <!-- alt syntax for foreach and if staments -->
        <?php foreach($pizzas as $pizza): ?>
        <div class="col s6 md3">
            <div class="card z-depth-0">
                <img src="./img/pizza.svg" alt="pizza" class="pizza">
                <div class="card-content center">
                    <h6><?php echo htmlspecialchars(strtoupper($pizza['title']));  ?></h6>
                    <div>
                        <ul><?php 

                    $ingredients = explode(",", $pizza['ingredients']);

                    foreach($ingredients as $ingredient): ?>
                            <li><?php  echo htmlspecialchars(strtoupper($ingredient)); ?></li>
                            <?php endforeach;?>

                    </div>
                    </ul>
                </div>
                <div class="card-action right-align">
                    <!-- sending params -->
                    <a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">more info</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>







    </div>
</div>



<?php include "./templates/footer.php"?>

</html>