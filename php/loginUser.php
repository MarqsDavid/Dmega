<?php
session_start();

include_once('conexao.php');

// Check if the form was submitted and if the email and passwordUsers fields are not empty
if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['passwordUsers']))
{
    // Get the form values
    $email = $_POST['email'];
    $passwordUsers = $_POST['passwordUsers'];

    // SQL query to check the user credentials
    $sql = "SELECT * FROM users WHERE email = '$email' AND passwordUsers = '$passwordUsers'";
    $result = $conexao->query($sql);

    // Check if the query returned any result
    if($result && $result->num_rows > 0)
    {
        // Get the user information from the query result
        $row = $result->fetch_assoc();

        // Set the user information in the session
        $_SESSION['id'] = $row['id'];
        $_SESSION['nameUser'] = $row['nameUser'];
        $_SESSION['lastName'] = $row['lastName'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['email'] = $row['email'];
        // Other user information that you want to store in the session

        // Redirect to the home.php page after successful login
        header('Location: ../pages/home.php');
        exit(); // Terminate the script after redirection
    }
    else
    {
        // Redirect back to the login page if the credentials are invalid
        header('Location: ../login.php');
        exit(); // Terminate the script after redirection
    }
}
else
{
    // Redirect back to the login page if the form data was not sent correctly
    header('Location: ../login.php');
    exit(); // Terminate the script after redirection
}
?>
