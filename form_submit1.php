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
        $nm=$_POST['name'];
        $eml=$_POST['email'];
        $no=$_POST['number'];
        $addr=$_POST['text'];
        $dob=$_POST['text-1'];
        $gender=$_POST['radiobutton-1'];
        $role=$_POST['text-2'];
        $rge=$_POST['range'];
        if(isset($_POST['checkbox1'])){
            // Checkbox is checked
            $exp = 1;
        } else {
            // Checkbox is not checked
            $exp = 0;
        }
        $pdf_name = $_FILES['pdf_file']['name'];
        $img_name = $_FILES['img']['name'];
        $img_pay = $_FILES['pay1']['name'];
        // $sql = "insert into job_seek values($nm,$eml,$no,$addr,$dob,$gender,$role,$exp,$pdf_name)";
        // if(mysqli_query($con,$sql))
        // {
        //     echo "Records Inserted successfully";
        // }
        // else{
        //     echo "Failed to insert records";
        // }
        if(isset($_POST['submit'])) {
            $target_Path = "uploads_resume/";
            $target_Path = $target_Path.basename( $_FILES['pdf_file']['name'] );
            move_uploaded_file( $_FILES['pdf_file']['tmp_name'], $target_Path );


            $target_Path1 = "upload_photo/";
            $target_Path1 = $target_Path1.basename( $_FILES['img']['name'] );
            move_uploaded_file( $_FILES['img']['tmp_name'], $target_Path1 );

            $target_Path2 = "upload_payment/";
            $target_Path2 = $target_Path2.basename( $_FILES['pay1']['name'] );
            move_uploaded_file( $_FILES['pay1']['tmp_name'], $target_Path2 );



        }

        $stmt = $con->prepare("INSERT INTO job_seek (nm, email, phone, addr, dob, gender, jobrole, exp, exp_digit, img ,pay_img,resumes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $nm, $eml, $no, $addr,$dob, $gender, $role, $exp, $rge,$img_name,$img_pay,$pdf_name);
        if ($stmt->execute()) {
            ?>
            <div class="alert alert-success" role="alert">
                    Data Saved Succesfully. Thank You Recruiters will contact soon . Have a nice day.....
            </div>
            <div class="alert alert-success" role="alert">
                You will be redirected to home page in 5 seconds.
            </div>
            <?php
            header("refresh:5;url=Home.html");
            //echo "You will be redirected to another page in 5 seconds";
            exit();
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                        Unable to process request. You will be redirected to home page.
            </div>
            <?php
            header("refresh:5;url=Home.html");
            //echo "Error: " . $stmt . "<br>" . $con->error;
        }
        
        $con->close();


    }


?>    
</body>
</html>