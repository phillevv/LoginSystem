<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
require_once('db.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="style.css">
    </head>

<body>
    
    <?php include('headerloggedin.php'); ?>
    
        <div class="container shadow p-5 mb-2 bg-light rounded">
            
                        <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="calendaremployees.php?timeStamp=">Kalender</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="myschedule.php">Tabell</a>
  </li>
</ul>

<?php


class Calendar{
    var $currentMonth;
    var $currentYear;
    var $currentDate;
    var $currentTime;
    var $prevTime;
    var $nextTime;
    var $weekDays;

    # func to initialise calendar
    function LoadCalendar($timeStamp){
        if(!empty($timeStamp)){
            $this->currentYear =  date('Y',$timeStamp);
            $this->currentMonth = date('m',$timeStamp); 
        }else{
            $this->currentYear =  date('Y');
            $this->currentMonth = date('m');
        }
        $this->currentDate = date('d');
        $this->currentTime = mktime(0, 0, 0, $this->currentMonth , 1 , $this->currentYear);
        $prevMonth = $this->currentMonth - 1;
        $nextMonth = $this->currentMonth + 1;
        $this->prevTime = mktime(0, 0, 0, $prevMonth , 1 , $this->currentYear);
        $this->nextTime = mktime(0, 0, 0, $nextMonth , 1 , $this->currentYear);
        $this->weekDays = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
    }

    # func to display calendar
    function DisplayCalendar($timeStamp=""){
        $this->LoadCalendar($timeStamp);

        $currentTime = mktime(0, 0, 0, $this->currentMonth , 1 , $this->currentYear);
        $prevMonth = $this->currentMonth - 1;
        $nextMonth = $this->currentMonth + 1;
        $prevTime = mktime(0, 0, 0, $prevMonth , 1 , $this->currentYear);
        $nextTime = mktime(0, 0, 0, $nextMonth , 1 , $this->currentYear);

        $monthText = date("F",$currentTime);
        $yearText = date("Y",$currentTime);
        $dayText = date("d",$currentTime);

        $totalDays = date('t', $currentTime);
        $firstDay = date("D", $currentTime);
        $weekDays = array('Mon','Tue','Wed','Thu','Fri','Sat','Sun');
        $listMonth = array();
        $prevMonthText = date('F', $prevTime);        
        $nextMonthText = date('F', $nextTime);

        $today = mktime();

        # to find the day of 1st day in a month
        $index = array_search($firstDay, $weekDays);

        # starts to print calender
        echo '
        <html>
        <head>
            <title>Loginsystem</title>
            <style>
            body{
                font-family: Tahoma, verdana, arial, sans-serif;
            }
            .header_tab{
                padding:10px 0 20px 0;
                font-size:18px;
                color:green;
            }
            
            input[type="submit"] {
            font-size: 10px;
            color:green;
            }
            
            button {
             font-size: 10px;
            color:green;
            }

            .header_tab A{
                text-decoration:none;
                color:#0092e8;
                background-color: snow;
            }

            .cal_tab{
                padding:0px;
                text-align:center;
                vertical-align:center;
            }
            
            .cal_tab td A{
                color:black;
                text-decoration:none;
            }
            .cal_tab .cal_head{
                background-color:dodgerblue;
                color:white;
                height:50px;
            } 
            
            
            #todays {
            text-align:center;
            padding: 1px 0px 2px;
            margin-top:25px;
            }
            
            
            /* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
            
            
            </style>
        <head>
        <body>
        <table align="center" border="0" class="header_tab">
            <tr>
                <th style="padding-right:50px;"><i class="fas fa-arrow-left mr-2"></i><a class="noBorder" href="calendaremployees.php?timeStamp='.$prevTime.'">'.$prevMonthText.'</a></td>
                <th class="badge badge-secondary"><h4 class="m-2">'.$monthText . " - ".$yearText.'</h4></td>
                <th style="padding-left:50px;"><a class="noBorder" href="calendaremployees.php?timeStamp='.$nextTime.'">'.$nextMonthText.'</a><i class="fas fa-arrow-right ml-2"></i></td>
            </tr>
        </table>
        
        <p>
        </p>
        <table align="center" cellpadding="0px" cellspacing="0px" border="1px" class="table table-bordered table-responsive">
            <tr class="cal_head">
                <td class="text-secondary text-center shadow">Måndag</td>
                <td class="text-secondary text-center shadow">Tisdag</td>
                <td class="text-secondary text-center shadow">Onsdag</td>
                <td class="text-secondary text-center shadow">Torsdag</td>
                <td class="text-secondary text-center shadow">Fredag</td>
                <td class="text-danger text-center shadow";>Lördag</td>
               <td class="text-danger text-center shadow">Söndag</td>
            </tr>';
        $w = 0;
        for($m = 1; $m <= $totalDays ; ){
            $d = ($m == 1) ? $index : 0;
            for( ; $d <= 6 ; $d++){
                $listMonth[$w][$d] = $m;
                $m++;
                if($m > $totalDays){break;}
            }
            $w++;
        }

        # to get total details of a month
        foreach($listMonth as $styleIdx => $listWeek){
            echo "<tr>";
            for($i = 0 ; $i <= 6 ; $i++){
                if (isset($listWeek[$i])) {
                    $day = $listWeek[$i] < 10 ? "0".$listWeek[$i] : $listWeek[$i];
                    $month = $this->currentMonth;
                      $year = $this->currentYear;
                        $content = "<form method='get' id='myForm' action='displaySchema.php'><div class='text-center'>
<button type='submit' class='btn btn-primary shadow' data-toggle='modal' data-target='#exampleModal'>
 $day-$month </button><input type='text' value='$day' hidden name='day' ><input type='text' value='$month' hidden name='month' > <input type='text' value='$year' hidden name='year' ><input type='text' hidden name='timeStamp' > <input type='text' value='$monthText' hidden name='' ></div></form>";

                } else {
                    $content = "&nbsp;";
                }
                $style = ($styleIdx % 2) ? "background-color:#E6E6E6" : "";
                /*if($listMonth[$w][$d] == date('d')){ 
                    $style = "background-color:#fcfcfc"; 
                } */
                echo "<td width='200px' height='70px' style='$style'>{$content}</td>";
            }
            echo "</tr>";
            
            echo "<script>

function saveReason()
{
    
    var Fornamn=prompt('Namn','');
    var TidIn=prompt('Tid In','');
    var Plats=prompt('Arbetsplats','');
    if (Fornamn!=null && Fornamn!='')
    {
        $.post('insertschemap.php', { Fornamn: Fornamn,TidIn:TidIn, Plats: Plats});
    }
}
</script>";

            
            
        }
        echo '</table>
           
              </body>
              </html>';
        
        
        
            
    }
    
    
    

    # func to display calendar header
    function DisplayHeader($class="",$td_class=""){
        $tmp = "<tr id='col'>";
        foreach($this->weekDays as $day){
            $tmp .= "<td class='$td_class'>$day</td>";
        }
        $tmp .= "</tr>";
        return $tmp;
    }
    
    
    

}

# call calendar class to display calendar
$calendar = New Calendar();
$calendar->DisplayCalendar($_GET['timeStamp']);


    
    ?>

            
                </div>



<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
    </html>