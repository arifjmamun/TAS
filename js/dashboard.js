$(document).ready( function() {
    $("#loader").hide();
    $("#byYear").on('change', function(){
        var years = $(this).val();
        var html = "";
        if(years != ""){
            var request = {
                type: 'post',
                url: 'php/ajaxHandler.php',
                data: {years: years, action: 'getMonths'},
                beforeSend: function () {
                    $("#loader").show();
                }
            };
            $.ajax(request).done(function(response){
                $("#loader").hide();
                var obj = $.parseJSON(response);
                //var options = $.map(obj.content, function(el){return el});
                //console.log(obj.content.length);
                for(var i=0; i<obj.content.length; i++){
                    html = html+"<option value='"+obj.content[i]+"'>"+obj.content[i]+"</option>";
                }
                var otherCell = new Array();
                var tableInnnerRow = new Array();
                var countPresent = countLate = countAbsent = 0;

                //console.log(obj.tableData);
                for(var i=0; i<obj.tableData.length; i++){
                    var slCell = "<td>"+i+"</td>";
                    for(var j=0; j<4; j++){
                        if (obj.tableData[i][j] == "Late" || obj.tableData[i][j] == "Absent" || obj.tableData[i][j] == null){
                            otherCell[j] = "<td class='danger'>"+obj.tableData[i][j]+"</td>";
                        }
                        else{
                            otherCell[j] = "<td>"+obj.tableData[i][j]+"</td>";
                        }

                    }
                    tableInnnerRow[i] = "<tr>"+slCell+otherCell.join("")+"</tr>";
                    if (obj.tableData[i][0] == "Present"){
                        countPresent++;
                    }
                    if (obj.tableData[i][0] == "Late"){
                        countLate++;
                    }
                    if (obj.tableData[i][0] == "Absent"){
                        countAbsent++;
                    }
                }
                var total = countPresent + countLate + countAbsent;
                var presentRate = ((countPresent * 100)/total).toFixed(2);
                var lateRate = ((countLate * 100)/total).toFixed(2);
                var absentRate = ((countAbsent * 100)/total).toFixed(2);

                $("#tablesRow").html(tableInnnerRow.join(""));
                $("#attendanceRate").html("Attendance Rate: "+presentRate+"%");
                $("#lateAttendanceRate").html("Late Attendance Rate: "+lateRate+"%");
                $("#absenceRate").html("Absence Rate: "+absentRate+"%");
                $("#byMonth").html("<option value=''>Select One</option>"+html);
                $(document).trigger('change');
            });
        }
    });

    $("#byMonth").on('change', function(){
        var years = $("#byYear").val();
        var months = $(this).val();
        if(years != "" && months != ""){
            var request = {
                type: 'post',
                url: 'php/ajaxHandler.php',
                data: {years: years, months: months, action: 'getTableData'},
                beforeSend: function () {
                    $("#loader").show();
                }
            };
            console.log(request);
            $.ajax(request).done(function(response){
                $("#loader").hide();
                var obj = $.parseJSON(response);
                var otherCell = new Array();
                var tableInnnerRow = new Array();
                var countPresent = countLate = countAbsent = 0;

                for(var i=0; i<obj.tableData.length; i++){
                    var slCell = "<td>"+i+"</td>";
                    for(var j=0; j<4; j++){
                        if (obj.tableData[i][j] == "Late" || obj.tableData[i][j] == "Absent" || obj.tableData[i][j] == null){
                            otherCell[j] = "<td class='danger'>"+obj.tableData[i][j]+"</td>";
                        }
                        else{
                            otherCell[j] = "<td>"+obj.tableData[i][j]+"</td>";
                        }

                    }
                    tableInnnerRow[i] = "<tr>"+slCell+otherCell.join("")+"</tr>";
                    if (obj.tableData[i][0] == "Present"){
                        countPresent++;
                    }
                    if (obj.tableData[i][0] == "Late"){
                        countLate++;
                    }
                    if (obj.tableData[i][0] == "Absent"){
                        countAbsent++;
                    }
                }
                var total = countPresent + countLate + countAbsent;
                var presentRate = ((countPresent * 100)/total).toFixed(2);
                var lateRate = ((countLate * 100)/total).toFixed(2);
                var absentRate = ((countAbsent * 100)/total).toFixed(2);

                $("#tablesRow").html(tableInnnerRow.join(""));
                $("#attendanceRate").html("Attendance Rate: "+presentRate+"%");
                $("#lateAttendanceRate").html("Late Attendance Rate: "+lateRate+"%");
                $("#absenceRate").html("Absence Rate: "+absentRate+"%");
                $(document).trigger('change');
            });
        }
    })
});