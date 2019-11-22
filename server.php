<?php 

session_start();
// Initialising variables
$username = $email = "";
$errors = array();

//connect to DB
$conn = mysqli_connect('localhost','willie','password1','practice') or die ("Could not connect to DB");

//Register Users
$username = mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

//form validation

if (empty($username)) {
    array_push($errors, "Username is required");
}
if (empty($email))  {
    array_push($errors, "email is required");
}
if (empty($password_1)) {
    array_push($errors, "password is required");
}
if ($password_1 != $password_2) {
    array_push($errors, "passwords do not match");
}

//check db for existing username

$user_check_query = "select * from user where username = '$username' or email = '$email' limit 1";

$results = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user)   {
    if ($user['username'] === $username) { array_push($errors, "User already exists"); }
    if ($user['email'] === $email) { array_push($errors, "the email already registered with another username"); }
}


// register user if no error

if (count($errors) == 0)    {

    $password = md5($password_1);
    $query = "insert into user (username, email, password) values ('$username', '$email', '$password')";

    mysqli_query($conn, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

    header('location: index.php');
}

// login user

 if (isset($_POST['login_user']))    {
     $username = mysqli_real_escape_string($conn, $_POST['username']);
     $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username))   {
        array_push($errors, "username required");
    }
    if (empty($password))   {
        array_push($errors, "password required");
    }

    if (count($errors) == 0)    {
        $password = md5($password);

        $query = "SELECT * FROM user WHERE username = '$username' and password = '$password' ";

        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results))   {

            $_SESSION['username']  = $username;
            $_SESSION['success'] = "Logged in successfully";
            header('location: index.php');
        }
        else    {
            array_push($errors, "Wrong username/password combination");
        }

    }

 }


?>