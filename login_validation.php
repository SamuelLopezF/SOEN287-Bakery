<?php
if(login())
{
    session_start();
    $_SESSION['login_status'] = 'logged in';
    $_SESSION['username_logged_in'] = $_POST['email_login'];
    echo $_SESSION['login_status'] . "<br>";
    echo $_SESSION['username_logged_in'];
    print_r($_SESSION);

    header('Location: profile.php');
}else{
    $_SESSION['login_status'] = 'not logged in';
    header('Location: Account.php?error=invalidentry');
}

function connect_to_database()
{
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "soen_admin";
    
    $connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if($connect)
    {
        echo 'connected  to database <br>';
    }else{
        echo 'not connected';
    }
    return $connect;
}

function login()
{
    $email = $_POST['email_login'];
    echo $email . "<br>";
    $password = $_POST['password_login'];
    echo $password . "<br>";
    $connect = connect_to_database();
    $sql = "SELECT * FROM `user_account` WHERE  email = ? AND pwrd = ? ;";

    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        echo ' something went wrong sql';
    }else {
        echo 'stmt prepare worked  <br> ';
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);


        $result_data = mysqli_stmt_get_result($stmt);
        if($row_from_database = mysqli_fetch_assoc($result_data))
        {   
            print_r ($row_from_database);
            echo '<br> fetch assoc true <br>';
            print_r($result_data);
            return true;
        }else{
            $_SESSION['login_status'] = "";
            echo ' fetch assoc false  <br> ';
            print_r($result_data);
            echo "<br>";
            return false;
        }
    }
}

function log_out()
{
    $_SESSION['login status'] = 'You logget out';
    session_unset();
}
?>
