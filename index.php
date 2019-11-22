<?php 

session_start();

if (isset($_SESSION['username']))   {
    $_SESSION['msg'] = "you must login to view this page";

    header("location: login.php")    ;

}

if (isset($_GET['logout'])) {

    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?> 


<html>
<title>Home Page</title>

<body>
    <h1>This is a homepage</h1>

    <?php if (isset($_SESSION['success']))  :  ?>
        <div>
        <h3>
        <?php 
        
        print $_SESSION['success'];
        unset($_SESSION['success']);
        
        ?>
        </h3>
        </div>
    <?php endif ?>
    
// if the user logs in , then prints the info 

<?php  

if (isset($_SESSION['username'])) : 

?>

<h3>Welcome <strong><?php print $_SESSION['username']; ?></strong></h3>

<button><a href="index.php?logout='1'"></a></button>

<?php endif ?>

</body>
</html>