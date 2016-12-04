<?php
@session_start();
date_default_timezone_set('Asia/Dhaka');
include 'php/connection.php';
$countArrayStatus = $countArrayControl = 0;
$statusDataTable = array();
$controlDataTable = array();
$statusRate = array();
$presentRate = 0;
$lateRate = 0;
$absentRate = 0;
if(isset($_SESSION['userID'])){
    if(!empty($_SESSION['userID'])){

        $userID = $_SESSION['userID'];

        $cmd = mysqli_query($con, "SELECT status, entryTime, leaveTime, days FROM attendanceinfo WHERE userID='$userID' ORDER BY dates DESC, months DESC, years DESC");
        while($statusData = mysqli_fetch_row($cmd)){
            $statusDataTable[] = $statusData;
        }
        $countArrayStatus = count(array_filter($statusDataTable));

        $cmd = mysqli_query($con, "SELECT DISTINCT years FROM attendanceinfo WHERE userID='$userID'");
        while($controlData = mysqli_fetch_array($cmd)){
            $controlDataTable[] = $controlData['years'];
        }
        $countArrayControl = count(array_filter($controlDataTable));

        $cmd = mysqli_query($con, "SELECT status FROM `attendanceinfo` WHERE userID='$userID' ORDER BY status DESC");
        $countPresent = 0;
        $countLate = 0;
        $countAbsent = 0;

        while($statsusData = mysqli_fetch_array($cmd)){
            $statusRate[] = $statsusData['status'];
        }
        for ($i=0; $i<count($statusRate,0); $i++){
            if($statusRate[$i] == "Present"){
                $countPresent++;
            }
            if($statusRate[$i] == "Late"){
                $countLate++;
            }
            if($statusRate[$i] == "Absent"){
                $countAbsent++;
            }
        }
        $total = $countPresent + $countLate + $countAbsent;
        $presentRate = round(($countPresent * 100) / $total, 2);
        $lateRate = round(($countLate * 100) / $total, 2);
        $absentRate = round(($countAbsent * 100) / $total, 2);
    }
}
else{
    header('Location: login.php');
}
?>

<?php
    include_once 'php/header.php';
    include_once 'php/navigationAfter.php';
?>

    <div class="row" id="attendanceStatusContent">
        <div class="col-md-3" id="sidebar">
            <h4 id="attendanceRate">Attendance Rate: <?php echo $presentRate?>%</h4>
            <h4 id="lateAttendanceRate">Late Attendance Rate: <?php echo $lateRate?>%</h4>
            <h4 id="absenceRate">Absence Rate: <?php echo $absentRate?>%</h4>

            <div class="form-group form-inline">
                <label for="byYear">Year</label>
                <select name="byYear" id="byYear" class="form-control">
                    <option value="">Select One</option>
                    <?php
                        for($i=0; $i<$countArrayControl; $i++){
                            echo "<option value='$controlDataTable[$i]'>".$controlDataTable[$i]."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group form-inline">
                <label for="byMonth">Month</label>
                <select name="byMonth" id="byMonth" class="form-control">
                    <option value="">Select One</option>
                </select>
            </div>
            <div id="loader" data-loader="circle-scale"></div>
            
        </div>
        <div class="col-md-9">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>SL#</th>
                        <th>Status</th>
                        <th>Entry Time</th>
                        <th>Leaving Time</th>
                        <th>Day</th>
                    </tr>
                </thead>
                <tbody id="tablesRow">
                    <?php
                        for($i=0; $i<$countArrayStatus; $i++){
                            echo "<tr>";
                            echo "<td>$i</td>";
                            for($j=0; $j<4; $j++){
                                echo "<td>".$statusDataTable[$i][$j]."</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include_once'php/footer.php';?>