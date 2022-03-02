<?php

include('functions.php');

    $task = "encode";

    if ( isset( $_GET['task'] ) && $_GET['task'] != '' ) {

        $task = $_GET['task'];
    }

    $key = 'abcdefghijklmnopqrstuvwxyz1234567890';

    if ( 'key' == $task ) {

        $key = str_split($key);

        shuffle($key);

        $key = join('',$key);

    }
    
    
    if(isset($_POST['key']) && $_POST['key'] != ''){
            $key = $_POST['key'];
    }


    $scrambleData = '';

    if(isset($_POST['data']) && $_POST['data'] != ''){

        $scrambleData = scrambleData($_POST['data'],$key);

    }
   
    if('decode' == $task){
        
        if(isset($_POST['data']) && $_POST['data'] != ''){

            $scrambleData =  decodeData($_POST['data'],$key);

        }
    }



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Data Scrambler</title>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto">
                        <div class="scrabler-heading mt-3">
                        <h4>Data scrumbler</h4>
                        <p>use this application to scramble your data</p>
                        </div>

                    <a href="?task=encode" style="text-decoration: none;">Encode</a> |
                    <a href="?task=decode" style="text-decoration: none;">Decode</a> |
                    <a href="?task=key" style="text-decoration: none;">Generate Key</a>

                <form   method="POST">

                    <label for="key" class="form-label">Key</label>
                    <input type="text" name="key" id="" class="form-control" <?php displayKey($key) ?>>

                    <label for="data" class="form-label">Data</label>
                    <textarea name="data" id="" cols="30" rows="5" class="form-control"><?php echo  $_POST['data'] ?? '' ?></textarea>

                    <label for="result" class="form-label">Result</label>
                    <textarea name="result" id="" cols="30" rows="5" class="form-control"><?php  echo  $scrambleData;  ?></textarea><br>

                    <button type="submit" class="btn btn-primary">DO IT FOR ME</button>
                </form>

                    </div>
            </div>
        </div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
