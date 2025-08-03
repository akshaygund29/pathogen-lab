<!DOCTYPE html>
<html>
<head>
    <title>Job Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .background{
            position: absolute;
            width: 100%;
            height: 100vh;
        }
        .background::before {
            content: "";
            background-image: url('search.jpg');
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
<body>

    <div class="background">
    
        <div class="container" style="max-width:50%;">
            <div class="text-center mt-5 mb-4">
                <h2>Search & Apply for Job</h2>
            </div>
            
            <input type="text" class="form-control" id="job_search" autocomplete="off" placeholder="Search by job role or lab name....">
        </div>
        <div id="searchresult"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                $("#job_search").keyup(function(){
                    var input = $(this).val();
                    //alert(input);
                    if(input!=""){
                        $.ajax({
                            url:"jobsearch.php",
                            method:"POST",
                            data:{input:input},

                            success:function(data){
                                $("#searchresult").html(data);
                                $("#searchresult").css("display","block");
                            }
                        });
                    }else{
                        $("#searchresult").css("display","none");
                    }
                });
            });
        </script>
    
    </div>
    
</body>
</html>