<?php
   include("connect.php");
   $name=$_POST['username'];
   $mobile=$_POST['mobile'];
   $password=$_POST['password'];
   $cpassword=$_POST['cpassword'];
   $address=$_POST['address'];
   $image=$_FILES['image']['name'];
   $tmp_name=$_FILES['image']['tmp_name'];
   $role=$_POST['role'];
    if ($password==$cpassword) {
        move_uploaded_file($tmp_name,"../uploads/$image");
        $insert=mysqli_query($connect, "INSERT INTO user(name,mobile,password,address,photo,role,status,votes) VALUES('$name', '$mobile' ,'$password', '$address','$image', '$role',0,0)");

        if ($insert) 
        {
            echo'
          <script>
            alert("Registration Successfull !");
            window.location="../";
         </script>  
        ';
            
        }

        else
     {
        echo'
        <script>
        alert("Some Error Occured");
        window.location="../routes/registeration.html";
        </script>
        ';
        
     }
    }
    else
    {
        echo'
        <script>
        alert("Password and Confirm password do not match");
        window.location="../routes/registeration.html";
        </script>
        ';
        
    }

?>