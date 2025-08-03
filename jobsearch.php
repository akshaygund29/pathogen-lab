<?php
    include("db.php");
    if(isset($_POST['input'])){

        $input = $_POST['input'];
        $query="select * from recruiters where roless LIKE '{$input}%' OR labnm LIKE '{$input}%'";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0){?>

            <link rel="stylesheet" href="main.css">

            <table class="mt-4 content-table" style="width:70%; border: 1px solid black;
                border-collapse: collapse; padding: 0px 35px; position: absolute; top: 200px; left: 190px;">
                <thead>
                    <tr class="active-row">
                        <th>sr_no</th>
                        <th>Lab Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Job Role</th>
                    </tr>
                </thead>
                <tbody> 
                <?php
                    while($row= mysqli_fetch_assoc($result)){
                        $srno=$row['sno'];
                        $name=$row['labnm'];
                        $email=$row['email'];
                        $contact=$row['phno'];
                        $addr=$row['addresss'];
                        $role=$row['roless'];
                        ?>
                        <tr>
                            <td><?php echo $srno;?></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo "<a href='#'>$contact</a>";?></td>
                            <td><?php echo $addr;?></td>
                            <td><?php echo $role;?></td>      
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            
            </table>
            <?php
        }else{
            echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6>";
        }

    }
?>
