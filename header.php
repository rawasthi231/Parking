<?php
    include("connection.php");
    session_start();
    if (!$_SESSION['clientId']) {
        echo "<script>alert('Login first');
                window.location.href='index.php'</script>";
    }
    else{
        $cEmail = $_SESSION['clientId'];
        $result = mysqli_query($con, "select * from clients where clientEmail = '$cEmail'");
        $data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>ePMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                                    <!-- Fevicon -->
    <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
                                    <!-- font awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
                                    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
                                    <!-- JQuery -->
    <link rel="stylesheet" type="text/css" href="./css/jquery-ui.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>
<body>
    <div class="container-fluid">
        <div class="row header">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="floatleft">
                    <h2 style="color: #efefef; margin-top: 15px;">Park your vehicles</h2>
                </div>
                <div class="floatright">
                    <h4><?php echo $data['clientName']; ?></h4>
                    <button class="btn btn-outline-dark" onclick="areYouSure(); ">Logout</button>
                </div>
            </div>
        </div>
    </div>
    <div id="dialog-logout" class="ui-state-highlight" title="Warning">
        <p>Do you really want to logout?</p>
    </div>

<?php
    }
?>