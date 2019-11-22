<?php include('server.php'); ?>
<?php include('errors.php'); ?>
<link rel="stylesheet" href="form.css" type="text/css" >

<div class="container">

    <form id="user_registration" action="registration.php" method="POST">
        <h3>Register</h3>
        <h4>New users, Please fill the items to register.</h4>

        <fieldset>
            <!-- <label for="username">Username</label>
                <input type="text" name="username" required> -->
            <input type="text" placeholder="Your Name" tabindex="1" name="name" value="<?= $name ?>" autofocus>
            <span class="error"> <?= $nameErr ?></span>
        </fieldset>

        <fieldset>
            <input type="text" placeholder="Your Email Address" tabindex="2" name="email" value="<?= $email ?>">
            <span class="error"> <?= $emailErr ?></span>
            <!-- <label for="email">Email</label>
                <input type="email" name="email" required> -->
        </fieldset>

        <fieldset>
            <input type="password" placeholder="Your Passsword" tabindex="3" name="password_1">
            <!-- <span class="error"> </span>    -->
            <!-- <label for="password">Password</label>
                <input type="password" name="password_1" required> -->
        </fieldset>

        <fieldset>
            <input type="text" placeholder="Confirm password" tabindex="4" name="password_2">
            <!-- <span class="error"> </span>    -->
            <!-- <label for="password">Confirm Password</label>
                <input type="password" name="password_2" required> -->
        </fieldset>

        <!-- <button type="submit" name="Register">Submit</button> -->
        <fieldset>
            <button name="Register" type="submit" id="submit" data-submit="...Sending">Register</button>
        </fieldset>

        <!-- <p>Already a user? <a href="login.php"><b>Login</b></a></p> -->
        <!-- <div class="success">
            <p>Already a user?</p><b><a href="login.php">Login</a></b>
        </div> -->
    </form>
</div>