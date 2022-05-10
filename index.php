<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dycalendar.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- php part -->
    <?php

$pd = date("d"); // present day
$pm = date("m"); // present month
$py = date("Y"); // present year
$d = $m = $y = null;
$flag = true;
//========form date compare formula================
if (isset($_POST['submita4']) )  {

    $d = $_POST['d'];
    $m = $_POST['m'];
    $y = $_POST['y'];
    $dob = $d.".".$m.".".$y;
    $m = --$m ;

    if ($y > $py) {
    $d= 0;
    $flag = false;
    }

}
//==========function start==================
function srAgeCalc($final_dob){
$flag= 1;
$bday = new DateTime($final_dob); // Your date of birth
$today = new Datetime(date('m.d.y'));
$diff = $today->diff($bday);
if ($bday >= $today) {
   return  'Date of Birth Should be less then '.date('Y');   
   
}else{
    return sprintf('%d Years %d Months %d Days', $diff->y, $diff->m, $diff->d);
    
}

}
//========assignment 4 end=============

// ================database code===========

?>

    <!-- ==========html design========= -->
    <div class="container">

        <div class="row justify-content-center  my-5 calc">
            <div class="col-md-10">
                <div class="h5 pt-1 result  text-center text-success my-4  ">
                <h4 class="name-vlu"><?php if (isset($_POST['submita4'])) {
                   echo "Hi ".$_POST['fullname'];
                } ?></h4>
             <h5 class="age_value"> <?php
            if (isset($_POST['submita4'])) {
            echo "<b>Your Age:</b> ". srAgeCalc($dob); }
         ?></h5>      
                </div>
            </div>
            <div class="col-md-10">
                <form action="" method="post" name="">
                    <!-- form name field start -->
                    <div class="form-group row ">
                        <label class="col-sm-3 col-sm-3 text-end pt-1 control-label date_label" for="fullname"
                            required>Your Full Name</label>
                        <div class="col-md-6 col-sm-4">
                            <input name="fullname" id="fullname" type="text" class="form-control"
                                placeholder="Enter Full Name" required>
                        </div>

                    </div>
                    <!-- form name field start -->
                    <div class="form-group row ">
                        <label class="col-sm-3 col-sm-3 text-end pt-1 control-label date_label" for="">Your Date of
                            Birth</label>
                        <div class="col-md-2 col-sm-3">
                            <input id="bday" name="d" type="text" class="form-control" placeholder="dd" required>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <input id="bmonth" name="m" type="text" class="form-control" placeholder="mm" required>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <input id="byear" name="y" type="text" class="form-control" placeholder="yy" required>
                        </div>
                    </div>
                    <!-- form end field end -->
                    <!-- form 3rd field start -->
                    <div class="form-group row mt-2 gt-0">
                        <label class="col-sm-3 text-end pt-1 control-label" for="">Today Date</label>
                        <div class="col-md-2 col-sm-3">
                            <input name="pd" type="text" readonly="readonly" class="form-control"
                                value="<?php   echo $pd." Day" ?>">
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <input name="pm" type="text" readonly class="form-control"
                                placeholder="<?php echo $pm." Month" ?>">
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <input name="py" type="text" readonly="readonly" class="form-control"
                                placeholder="<?php echo $py." Year" ?>">
                        </div>
                    </div>
                    <!-- form rrd field end -->
                    <!-- form button start -->
                    <div class=" form-group  row  ">
                        <div class=" col-md-3  offset-md-3 ">
                            <input class="button m-0-md" name="submita4" type="submit" class="form-control"
                                value="Calculate">
                        </div>
                    </div>
                    <!-- form button end -->


                </form>
            </div>
        </div>

        <!-- calender row  -->
        <div class="row justify-content-center  ">
            <div class="col-md-5 col-sm-6 mb-3">
                <div class="dycalendar_dob ">

                </div>
            </div>
            <div class="col-md-5 col-sm-6">
                <div class="dycalendar_tday">

                </div>
            </div>
        </div>
    </div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/dycalendar.js"></script>

    <script>
        dycalendar.draw({
            target: '.dycalendar_dob',
            type: 'month',
            dayformat: 'full',
            monthformate: 'full',
            highlighttargetdate: true,
            prevnextbutton: 'show',
            month: <?php echo $m ?> ,
            date: <?php echo $d ?> ,
            year: <?php echo $y ?>


        })
        dycalendar.draw({
            target: '.dycalendar_tday',
            type: 'month',
            dayformat: 'full',
            monthformate: 'full',
            highlighttargetdate: true,
            prevnextbutton: 'show'
        })
    </script>
</body>

</html>