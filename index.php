<?php
  // This will prevent the user to access the system to ensure that they must login first
  if(empty($_SESSION['coordinator'])){
    session_start();  //if the user login successfully, session will start
  }
  if(isset($_SESSION['coordinator'])){
  } // if the session has already started, nothing happens
  else{
    header("Location: ../ADMIN/login_session.php");
  } // redirect to login page if session is not yet set


    include_once "../Connection/connection.php";
    $con = connection();

    include "upload-script.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="http://localhost/bccat/IMAGES/bcc-logo.png">
    <title>BCC-ATS</title>

    <script type="text/javascript">
        function toggle(){
        document.getElementById('sidebar').classList.toggle('active');
        document.getElementById('content').classList.toggle('active');
        }
    </script>


    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f4106a4f9b.js" crossorigin="anonymous"></script>


    <!-- DATA TABLES -->
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready( function() {
            $('#mytable').DataTable({
                "ordering": false,
                "searching": false
            });
        } );
    </script>



    <style>
        body{
            /* background-color:#f7f7f7; */
            margin:0;
            padding:0;
        }
        

        #sidebar{
            background:#00525e;
            position:fixed;
            height:100%;
            width:50px;
            padding:0px;
            transition: .2s;
            z-index:10;
        }

        #sidebar.active{
            width:250px;
            transition: .2s !important;
            padding:10px;
        }

        #sidebar > *{
            color:#fff !important;
            font-family:Calibri !important;
            width:100%;
        }


        #toggle{
            text-align:center;
            padding:10px;
            margin-bottom:15px;
            width:100%;
            /* border: 1px solid red; */
        }

        #toggle > i{
            font-size: 25px;
            text-align: end;
        }

        #sidebar.active>#toggle{
            text-align:end;
            margin-bottom:0px;
        }


        #logo-holder{
            text-align:center;
            padding:0;
            background:none;
        }

        #sidebar.active > #logo-holder{
            padding:10px;
            background: #00444e;
        }

        #logo{
            height:auto;
            max-height:0px;
            display: block;
            margin: auto;
        }

        #sidebar.active > #logo-holder > #logo{
            height:auto;
            max-height:100px;
        }


        #logo-holder > .bccats{
            font-size:0px;
            display: block;
        }

        #sidebar.active > #logo-holder > .bccats{
            font-size: 16px !important;
            text-align: center;
        }


        a{
            color:#fff;
            text-decoration:none !important;
            font-size:18px;
        }

        nav{
            border:2px solid #00525e;
            padding:10px;
            background:#014a55;
            text-align: center;
        }
        nav:hover{
            background:#00444e;
            color:#fff;
        }

        #sidebar.active>#navs-holder>hr{
            display: block;
            font-size: 0px;
        }

        #sidebar.active>#navs-holder>div>a>nav{
            width:100%;
            text-align:start;
            padding:10px;

            display: flex;
        }

        #sidebar.active>#navs-holder>div>a>nav>i{
            /* font-size:25px; */
            padding:0;
        }

        #navs-holder>div>a>nav>span{
            font-size:0px;
            display: block;
        }

        #sidebar.active>#navs-holder>div>a>nav>span{
            font-size:16px;
        }




        #content{
            /* margin-left:50px; */
            /* border:1px solid; */
            margin-left:50px;
            padding: 0px 25px 0px 25px;
            transition: .3s;
        }

        #content.active{
            transition: .3s;
            left:0;
        }

        .dropdown-item{
            font-size:medium;
        }






        #head-title{
            /* background:#d4d4d4; */
            padding:10px 5px 10px 5px !important;
            color:#000;
            font-size:23px !important;
            /* font-weight:bold; */
            border:none;
        }





        .container{
            display: flex;
            /* border:1px solid #4d4d4d;. */
            margin:0;
            padding:0;
        }

        .container > *{
            border:1px solid #4d4d4d;
            padding:2px 10px 2px 10px;
            margin:2px;
        }

        .container > *:hover{
            font-weight:500;
        }

        .container > * > a{
            font-size:16px;
        }








        footer{
            padding:12px;
            font-family:Calibri;
            /* border:1px solid; */
            color:gray;
        }














        h2{
            text-align: center;
        }

        .upload-form{
            border:1px solid #aaa;
            padding:10px;
            width: 100%;
        }


        .images{
            height:auto;
            max-height:100%;
            width:auto;
            max-width: 100%;
            margin:auto;
            /* border: 1px solid; */
        }

        .display{
            background:#fff;
            /* border:1px solid #ccc; */
            border-collapse: separate;
            border-spacing: 10px!important;
            margin:auto;
        }


        td{
            text-align:center;
            /* border:1px solid #aaa; */
            padding:10px;
        }


        .rmv{
            width:auto;
            /* border:2px solid #aaa; */
            border:none;
            background: none;
            font-size: 18px;
        }









        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */

        /* select filter */
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #aaa;
            border-radius: 3px;
            background-color: transparent;
            padding:0px;
            margin-bottom:10px;
        }

        /* pagination button */
            .dataTables_wrapper .dataTables_paginate .paginate_button {
            box-sizing: border-box;
            display: inline-block;
            min-width: 1.5em;
            padding:0px 15px;
            margin-left: 2px;
            text-align: center;
            text-decoration: none !important;
            cursor: pointer;
            color: inherit !important;
            border: 1px solid transparent;
            border-radius: 2px;
        }


        table.dataTable thead th,
        table.dataTable thead td {
            padding:0;
        }

        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */





        @media only screen and (min-width:1000px){
            h2{
                text-align: start;
            }

            img{
                height:auto;
                max-height:70vh;
                width:auto;
                max-width:100vh;
                margin:auto;
            }

            .input-group{
                width:30%;
            }


            .rmv{
                font-size: 20px;
                /* margin:auto; */
            }


            #sidebar{
                background:#00525e;
                position:fixed;
                height:100%;
                width:250px;
                padding:10px;
                transition: .2s;
            }

            #sidebar.active{
                width:50px;
                transition: .2s !important;
                padding:0px;
            }

            #sidebar > *{
                color:#fff !important;
                font-family:Calibri !important;
                width:100%;
            }


            #toggle{
                text-align:end;
                margin-bottom:0;
                padding:0;
                /* border: 1px solid red; */
            }

            #toggle > i{
                font-size: 25px;
            }

            #sidebar.active>#toggle{
                width:100%;
                text-align: center;
                padding:10px;
                margin-bottom:100px;
            }


            #logo-holder{
                text-align:center !important;
                padding:5px;
                background: #00444e;
            }

            #sidebar.active > #logo-holder{
                padding: 0;
                background:none;
            }

            #logo{
                height:auto;
                max-height: 120px;
                margin: auto;
            }

            #sidebar.active > #logo-holder > #logo{
                height:auto;
                max-height:0px;
                display: block;
            }


            #logo-holder > .bccats{
                font-size: 18px !important;
                text-align: center;
            }

            #sidebar.active > #logo-holder > .bccats{
                font-size: 0px !important;
            }


            a{
                color:#fff;
                text-decoration:none !important;
                font-size:18px;
            }

            nav{
                border:2px solid #00525e;
                padding:10px;
                background:#014a55;

                display: flex;
            }
            nav:hover{
                background:#00444e;
                color:#fff;
            }

            #sidebar.active>#navs-holder>hr{
                display: block;
                font-size: 0px;
            }

            #sidebar.active>#navs-holder>div>a>nav{
                width:100%;
                text-align: center;
                padding:10px;
            }

            #sidebar.active>#navs-holder>div>a>nav>i{
                font-size:25px;
                padding:0;
            }

            #navs-holder>div>a>nav>span{
                font-size:18px;
            }

            #sidebar.active>#navs-holder>div>a>nav>span{
                font-size:0px;
                display: block;
            }






            #content{
                /* margin-left:50px; */
                /* border:1px solid; */
                margin-left:250px;
                padding: 0px 25px 0px 25px;
                transition: .3s;
            }

            #content.active{
                /* margin-left:250px; */
                margin-left:50px;
                transition: .3s;
                left:0;
            }
        }
    </style>
</head>


<body>

    <div id="sidebar">
        <div id="toggle">
            <i class="fa-sharp fa-solid fa-bars" onclick="toggle()"></i>
        </div>
        </br>
        <div id="logo-holder" onclick="">
            <img src="http://localhost/BCCAT/IMAGES/bcc-logo.png" alt="" id="logo">
            <div class="bccats">Binalatongan Community College Alumni Tracking System</div>
        </div>

        <div id="navs-holder">
            <p></p>
            <div>

                <a href="../ADMIN/dashboard.php">
                    <nav>
                        <i class="fa-sharp fa-solid fa-gauge" style="margin-right:8px;"></i>
                        <span>Dashboard</span>
                    </nav>
                </a>

                <a href="../CRUD-Alumni/enlistment.php">
                    <nav>
                        <i class="fa-solid fa-list" style="margin-right:8px;"></i>
                        <span>Enlistment</span>
                    </nav>
                </a>

                <a href="../Tracking List/clm.php">
                    <nav>
                        <i class="fa-solid fa-address-book" style="margin-right:8px;"></i>
                        <span>Tracking List</span>
                    </nav>
                </a>

                <a href="../Gallery/index.php" style="font-weight:bold;">
                    <nav style="background:#00444e;"> 
                        <i class="fa-regular fa-calendar-days" style="margin-right:8px;"></i>
                        <span>Events</span> 
                    </nav>
                </a>

                <a href="../CRUD-Degree/degree.php">
                    <nav>
                        <i class="fa-solid fa-book" style="margin-right:8px;"></i>
                        <span>Degrees</span>
                    </nav>
                </a>
            </div>
        </div>
    </div>














    <div id="content">


        <table style="width:100%">
            <tr style="border:none;">
                <td colspan="" id="head-title" style="text-align:start">
                    <i class="fa-solid fa-bullhorn"></i> Manage Events
                </td>
                <td colspan="" style="text-align:end; border:none; padding:5px !important">
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border:1px solid gray; background:#f9f9f9; font-size:14px;">
                            Settings
                        </button>

                        <ul class="dropdown-menu">
                            <li><a href="../ADMIN/account.php" class="dropdown-item">Change Password</a></li>
                            <li><a href="" class="dropdown-item">Log History</a></li>
                            <li><a href="../ADMIN/logout.php" class="dropdown-item">Log-out</a></li>
                        </ul>
                    </div>
                </td>
            </tr>

            <tr  style="border:none;">
                <td colspan="2" style="border:none; padding:10px 0px 10px 0px !important;">
                    <div style="border:1px solid #a4a4a4"></div>
                </td>
            </tr>
        </table>





        <div class="container">
            <span class="row1">
                <a href="../Announcements/index.php" style="color:#000">Announcements</a>
            </span>
            <!--  -->
            <span class="row2" style="background: #038195;">
                <a href="index.php" style="color:#fff;">Gallery</a>
            </span>
        </div>
        <br>







        <?php if(!empty($statusMsg)){ ?>
            <p> <?=$statusMsg; ?> </p>
        <?php } ?>

    
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Upload Image <i>(jpg, png, jpeg)</i>:</label>
            <div class="input-group">
                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="submit">
                    Upload
                </button>
            </div>
        </form>
        

        <br>

        <table id="mytable" class="display">

        <?php
            $query = "SELECT * FROM `gallery` ORDER BY `upload_time` DESC";
            $config = $con->query($query) or die ($con->error);
            $num_rows = $config->num_rows;
            $row = $config->fetch_assoc();
        ?>


            <thead>
                <tr>
                    <th style="color:gray; font-weight:normal; font-style:italic;">
                        <?="containing: " . $num_rows . " image(s)";?>
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                    if($num_rows > 0){ 
                        
                        do{
                            $imgURL = 'uploads/'.$row["img_file"];
                ?>

                        <tr>
                            <td>
                                <!-- Display the uploaded images -->
                                <form action="delete-script.php" method="POST" class="upload-form">
                                    <input type="text" name="img_code" value="<?=$row['img_code'];?>" hidden>
                                    <input type="text" name="file_name" value="<?=$imgURL;?>" hidden>
                                    <div style="text-align:end;">
                                        <i style="color:#4D4D4D;">
                                            <?="Date/Time Posted: " . $row['upload_time'];?>
                                        </i>
                                        |
                                        <button class="rmv" name="terminator">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                    <br>
                                    

                                    <div>
                                        <img src="<?php echo $imgURL;?>" class="images" alt="">
                                    </div>
                                </form>
                                <!-- <hr> -->
                            </td>
                        </tr>

                <?php
                        }while($row = $config->fetch_assoc());
                    }else{
                ?>
                        <p>No image(s) found...</p>
                <?php        
                    }
                ?>

            </tbody>

        </table>
        </br>
        <footer>
            <hr>
            <div style="text-align:end; padding:0px 10px 0px 10px;">
                ©apg | Binalatongan Community College Alumni Tracking System - 2022 | All Rights Reserved
            </div>
        </footer>
        </br>
    </div>


  
    <!-- Modal -->
    <div class="modal fade" id="logout" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header">
                    Logging out...
                </div>

                <div class="modal-body" style="text-align:center;">
                    Are you sure you want to logout?
                </div>

                <div class="modal-footer">
                    <a href="../ADMIN/logout.php"> <button name="ok" class="btn btn-success" id="yes"> Yes </button> </a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>


</body>
</html>