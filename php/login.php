<?php
    include "connection.php";
    $email = $_POST['email'];
    $passw = $_POST['passw'];
    $email_stmt = $conn->prepare("Select json_extract(registration_details,'$.email','$.password') from user_registration where json_extract(registration_details,'$.email') = ?");
    $email_stmt->bind_param("s",$email);
    try{
        if($email_stmt->execute()){
            $result = $email_stmt->get_result();
            if($result->num_rows>0){
                if($result.fetch_assoc()["password"]===$passw){
                    $response = "Successful";
                }else{
                    $response = "Password incorrect";
                }
            }
            else{
                $response = "No user record found";
            }
        }else{
            $response="Error from database while checking for existance "+mysqli_error();
        }
    }
    catch(Exception $e){
        $response="Something went wrong ".$e;
    }
    echo $response;
    $register_stmt->close();
    $conn->close();

?>