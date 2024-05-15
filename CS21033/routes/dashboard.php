<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location:../");
}
$userdata=$_SESSION['userdata'];
$groupsdata=$_SESSION['groupsdata'];

if ($_SESSION['userdata']['status']==0) {
    $status='<b style="color:red">Not Voted</b>';
} 
else {
    $status='<b style="color:green">Voted</b>';
}


?>

<html>
<!-- <link rel="stylesheet" href="../CSS/stylesheet.css"> -->
<head>
    <title>Online Voting System - Dashboard</title>

    <style> 
        body{
            background-color:aquamarine;
            background-size: cover;
            background-position-y: 80px;
            background-repeat: no-repeat;
            background-image: url("../CSS/images/tricolor-1286684_640.jpg");
        }

       #button{
        padding: 8px;
        size: 80px;
        border-radius: 15px;
        background-color: rgb(0, 0, 0);
        color: azure;
        font-size: 15px;
        width: 60px;
        cursor: pointer;
        
       }

       #button:hover{
        outline-color: transparent;
        outline-style:solid;
        box-shadow: 0 0 0 1px #000000;
        background-color: rgb(46, 100, 239);
        border-color: aliceblue;
       }

       h1{
         margin-top:-1.5%;

       }

       #Profile{
        padding:10px;
        margin-top:10%;
        border: 0px;
        border-style:solid;
        border-color:black;
        width: 35%;
        background-color:white;
       }
       /* img{
        margin-left:28%;
       } */

       #Group{
        padding:10px;
        margin-top:-27.8%;
        margin-right:2%;
        border: 0px;
        border-style:solid;
        border-color:black;
        width: 55%;
        background-color:white;
        float:right;
       }
       
      #votebtn{
        width:12%;
        height:4%;
        border-radius: 15px;
        font-family:'Copperplate';
        background-color: rgb(180, 242, 118);
        /* size:25%; */
      }
      #votebtn:hover{
        outline-color: transparent;
        outline-style:solid;
        box-shadow: 0 0 0 1px #000000;
        background-color:  #05f916;
        border-color:  rgb(148, 236, 59);
        color:white;
        font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
       }
       
       

    </style> 
</head>


<body>

    
    <div id="mainSection">
        <div id="headerSection">
        <a href="../"><button id="button" style="margin-left: 4%;";>Back</button></a> </styl> 
        <a href="logout.php"><button id="button" style="margin-left: 84%;";>Logout</button></a></styl>
        <center><h1>Online Voting System</h1></center>
        </div>
        <hr>
        <div id="Profile">
           <center> <img src="../uploads/<?php echo $userdata['photo'] ?>" height="200" width="200"></center><br><br><br>
            <b>Name: </b><?php echo $userdata['name']?><br><br>
            <b>Mobile: </b><?php echo $userdata['mobile']?><br><br>
            <b>Address: </b><?php echo $userdata['address']?><br><br>
            <b>Status: </b><?php echo $status?><br><br>
        </div>
        <div id="Group">
              <?php
                    if ($_SESSION['groupsdata'])
                    {     
                            for ($i=0; $i <count($groupsdata) ; $i++)
                        
                        {   ?>
                         
                            

                            <div>
                                <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100"><br><br>
                                <b>Group Name:</b><?php echo $groupsdata[$i]['name']?><br><br>
                                <b>Votes:</b><?php echo $groupsdata[$i]['votes']?><br><br>
                                <form action="../api/vote.php" method="POST">
                                    <input type="hidden",name="g_votes" value="<?php echo $groupsdata[$i]['votes']?>">
                                    <input type="hidden",name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                                    <input type="submit" name="votebtn" value="Vote" id="votebtn">

                                </form>
                            </div>
                            <hr>
                            
                            <?php
                        }
                    }   
                    
             
        
        
                ?>
                
     </div>
  </div>
</body>


</html>