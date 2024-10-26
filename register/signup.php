<?php
$showAlert = false;
$showErrors = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "partials/_dbconnect.php";
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    $validDomains = ['gmail.com', 'bvrit.ac.in'];
    $domain = substr($username, strpos($username, '@') + 1); 

    if (!in_array($domain, $validDomains)) {
        $showErrors = "Please enter a valid email address with an allowed domain";
    } elseif (empty($username) || empty($password) || empty($cpassword)) {
        $showErrors = "Please fill in all fields";
    } elseif (strlen($username) < 8 || strlen($username) > 35) {
        $showErrors = "Username must be between 8 and 35 characters long";
    } elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $showErrors = "Please enter a valid email address";
    } elseif ($password !== $cpassword) {
        $showErrors = "Passwords do not match";
    } elseif (strlen($password) < 8 || strlen($password) > 25) {
        $showErrors = "Password must be between 8 and 25 characters long";
    } elseif (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,25}$/', $password)) {
        $showErrors = "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character";
    } else {
        $stmt = $conn->prepare("SELECT * FROM `usertab` WHERE `username` = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $showErrors = "Username already exists";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO `usertab` (`username`, `password`, `date`) VALUES (?, ?, current_timestamp())");
            $stmt->bind_param("ss", $username, $hash);

            if ($stmt->execute()) {
                $showAlert = true;
            } else {
                $showErrors = "An error occurred while creating the account";
            }
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>login</title>
</head>

<body>

    <?php
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your Account is now created and you can Login!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
        if($showErrors){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> '.$showErrors.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>