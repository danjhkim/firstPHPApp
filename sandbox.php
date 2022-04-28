<?php 
// <!-- ternary operators -->
$score = 50;
// exactly like javascript
$result = $score > 40 ? 'high score!' : "lower score!";


// SUPER GLOBALS
// $_GET["name"];
// $_POST['name'];

echo $_SERVER['SERVER_NAME'] . '<br />';
echo $_SERVER['REQUEST_METHOD'] . '<br />';
echo $_SERVER['SCRIPT_FILENAME'] . '<br />';
echo $_SERVER['PHP_SELF'] . '<br />';

// session super global and cookie
// saves data server side similar to cookies 

//cookies are client side stored

if(isset($_POST['submit'])) {
    //cookie set gender

    setcookie('gender', $_POST['gender'], time() + 86400);
    
    session_start();

    $_SESSION['name'] = $_POST["name"];

    header('Location: index.php');
    //send to index and check header for recall

}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Result: <?php echo $result; ?></p>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="name">
        <select name="gender">
            <option value="male">male</option>
            <option value="female">female</option>
            <option value="nonbinary">nonbinary</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>

</body>

</html>