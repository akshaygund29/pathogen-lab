<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .background{
            position: absolute;
            width: 100%;
            height: 100vh;
        }
        .background::before {
            content: "";
            background-image: url('bg.jpg');
            background-size: cover;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            opacity: 0.7; 
            z-index: -1;
        }
    </style>
</head>
<body class="background">
<?php
    include('db.php');
    if(isset($_POST['submit']))
    {
        $lb_nm=$_POST['name'];
        $r_eml=$_POST['email'];
        $lb_no=$_POST['number'];
        $lb_addr=$_POST['text'];
        $roles=$_POST['textarea'];
        // $sql = "insert into job_seek values($nm,$eml,$no,$addr,$dob,$gender,$role,$exp,$pdf_name)";
        // if(mysqli_query($con,$sql))
        // {
        //     echo "Records Inserted successfully";
        // }
        // else{
        //     echo "Failed to insert records";
        // }
        $stmt = $con->prepare("INSERT INTO recruiters (labnm, email, phno, addresss, roless) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$lb_nm, $r_eml,$lb_no,$lb_addr,$roles);
        if ($stmt->execute()) {
            ?>
            <div class="alert alert-success" role="alert">
                    Thank You . Agency will Contact as per Requirement . Have a nice day.....
            </div>
    <div class="alert alert-success" role="alert">
        You will be redirected to home page in 5 seconds.
    </div>
    <?php
    header("refresh:5;url=Home.html");
    //echo "You will be redirected to another page in 5 seconds";
    exit();
        } else {
            echo "Error: " . $stmt . "<br>" . $con->error;
        }
        
        $con->close();


    }

?>
</body>
</html>