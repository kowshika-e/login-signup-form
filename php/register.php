<?php
    include "connection.php";
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $passw = $_POST['passw'];
    $mobile = $_POST['mobile'];
    $data = json_encode(array("fname"=>$name,"lname"=>$lname,"email"=>$email,"password"=>$passw,"mobile"=>$mobile));
    $register_stmt = $conn->prepare("INSERT INTO user_registration(registration_details) VALUES (?)");
    $check_stmt = $conn->prepare("Select json_extract(registration_details,'$.email') from user_registration where json_extract(registration_details,'$.email') = ?");
    $register_stmt->bind_param("s",$data);
    // $check_email = "'".$email."'";
    $check_stmt->bind_param("s",$email);
    try{
        if($check_stmt->execute()){
            $result = $check_stmt->get_result();
            if($result->num_rows>0){
                $response = "User with email ".implode(" ",$result->fetch_assoc())." already exists";
            }
            else{
                if($register_stmt->execute()){
                    $response= "Successful";
                }else{
                    $response="Error from database while inserting data "+mysqli_error();
                }
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