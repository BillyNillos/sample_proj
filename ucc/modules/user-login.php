<?php
/*
* Log In Module
*/

    $entry_username = $_POST['username'];
    $password = $_POST['password'];

    // Decrypt password
    $cipher_method = 'AES-128-CTR';
    $option = 0;
    $decryption_iv = '7893475893479853';
    $decryption_key = 'univcalcitycrypt';
    $decrypted_password = openssl_encrypt($password, $cipher_method, $decryption_iv, $option, $decryption_key);

    // Connect to DB ($conn)
    include('db-settings.php');

    // Query
    $sql = "SELECT firstname, lastname FROM tbl_users WHERE username = '". $entry_username ."' AND password = '". $decrypted_password ."'";
    $result = $conn->query($sql);

    // Fire request
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $fullname = $firstname . " " . $lastname;
        }
        echo $fullname;
    } else {
        echo false;
    }

    // Close connection ($conn)
    $conn->close();

?>