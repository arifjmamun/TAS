<?php
@session_start();
date_default_timezone_set('Asia/Dhaka');
include 'php/connection.php';

include 'php/header.php';
include 'php/navigationBefore.php';
?>

<?php
//    class Information{
//        function GetData($name, $phoneNumber){
//            echo "Name is: "."$name";
//            echo "Phone Number is:"."$phoneNumber";
//        }
//    };
//$obj = new Information();
//$name = "Arif";
//$phoneNumber = "01832264272";
//$obj->GetData($name, $phoneNumber);
//
//?>

<!--<div>-->
<!--    <div class="row">-->
<!--        <div class="col-md-offset-2 col-md-8">-->
<!--            <div class="row">-->
<!--                <div class="seat col-md-offset-1 col-md-1">A4</div>-->
<!--                <div class="seat col-md-1">B4</div>-->
<!--                <div class="seat col-md-1">C4</div>-->
<!--                <div class="seat col-md-1">D4</div>-->
<!--                <div class="seat col-md-1">E4</div>-->
<!--                <div class="seat col-md-1">F4</div>-->
<!--                <div class="seat col-md-1">G4</div>-->
<!--                <div class="seat col-md-1">H4</div>-->
<!--                <div class="seat col-md-1">I4</div>-->
<!--                <div class="seat col-md-1">J4</div>-->
<!--                <div class="seat col-md-1">K4</div>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <div class="seat col-md-offset-1 col-md-1">A3</div>-->
<!--                <div class="seat col-md-1">B3</div>-->
<!--                <div class="seat col-md-1">C3</div>-->
<!--                <div class="seat col-md-1">D3</div>-->
<!--                <div class="seat col-md-1">E3</div>-->
<!--                <div class="seat col-md-1">F3</div>-->
<!--                <div class="seat col-md-1">G3</div>-->
<!--                <div class="seat col-md-1">H3</div>-->
<!--                <div class="seat col-md-1">I3</div>-->
<!--                <div class="seat col-md-1">J3</div>-->
<!--                <div class="seat col-md-1">K3</div>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <div id="mid" class="col-md-offset-11 col-md-1 seat">MID</div>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <div class="seat col-md-offset-1 col-md-1">A2</div>-->
<!--                <div class="seat col-md-1">B2</div>-->
<!--                <div class="seat col-md-1">C2</div>-->
<!--                <div class="seat col-md-1">D2</div>-->
<!--                <div class="seat col-md-1">E2</div>-->
<!--                <div class="seat col-md-1">F2</div>-->
<!--                <div class="seat col-md-1">G2</div>-->
<!--                <div class="seat col-md-1">H2</div>-->
<!--                <div class="seat col-md-1">I2</div>-->
<!--                <div class="seat col-md-1">J2</div>-->
<!--                <div class="seat col-md-1">K2</div>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <div class="seat col-md-offset-1 col-md-1">A1</div>-->
<!--                <div class="seat col-md-1">B1</div>-->
<!--                <div class="seat col-md-1">C1</div>-->
<!--                <div class="seat col-md-1">D1</div>-->
<!--                <div class="seat col-md-1">E1</div>-->
<!--                <div class="seat col-md-1">F1</div>-->
<!--                <div class="seat col-md-1">G1</div>-->
<!--                <div class="seat col-md-1">H1</div>-->
<!--                <div class="seat col-md-1">I1</div>-->
<!--                <div class="seat col-md-1">J1</div>-->
<!--                <div class="seat col-md-1">K1</div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->



<?php
	
?>

<?php include 'php/footer.php'?>
