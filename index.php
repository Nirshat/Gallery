<?php
    include_once "db-config.php";
    $con = connection();

    include "upload-script.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>



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
        }
    </style>
</head>


<body>

    

    <div id="content">

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
    </div>

</body>
</html>
