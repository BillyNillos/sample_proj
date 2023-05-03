<?php
/*
* Sign Up Module
*/

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $entry_username = $_POST['username'];
    $password = $_POST['password'];

    // Remove possible HTML tags on entries
    $firstname = strip_tags($firstname);
    $lastname = strip_tags($lastname);
    $entry_username = strip_tags($entry_username);

    // Encrypt password
    $cipher_method = 'AES-128-CTR';
    $option = 0;
    $encryption_iv = '7893475893479853';
    $encryption_key = 'univcalcitycrypt';
    $encrypted_password = openssl_encrypt($password, $cipher_method, $encryption_iv, $option, $encryption_key);

    // Connect to DB ($conn)
    include('db-settings.php');

    // Query
    $sql = "INSERT INTO tbl_users (firstname, lastname, username, password) VALUES ('". $firstname ."', '". $lastname ."', '". $entry_username ."', '". $encrypted_password ."')";

    // Fire request
    if ($conn->query($sql) === TRUE) {
        echo true;
    } else {
        echo false;
    }

    // Close connection ($conn)
    $conn->close();

?>