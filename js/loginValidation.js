$(document).ready(function(){
    $("#loader").hide();
    $("#signOut").click(function(){
        var clicked = true;

        var request = {
            type: 'post',
            url: 'php/ajaxHandler.php',
            data: {clicked: clicked, action: 'signOut'}
        };
        $.ajax(request).done(function(response){
            if(response == true){
                $(location).attr('href', 'login.php');
            }
        });
    });

    var globalUserID="";
    $("#wrap").on('click', '#recoverySubmit', function () {
        var securityQuestion = $("#securityQuestions select").val();
        var securityQuestions = ["","What was your childhood nickname?", "What is the name of your favorite childhood friend?", "What is your high school's principle's name?", "What is your favorite color?","What is your hobby?"];
        var securityAnswer = $("#securityAnswers input").val();
        var userID = $("#userID input").val();
        if (securityQuestion != ""  && securityAnswer != "" && userID != ""){
            var request = {
                type: 'post',
                url: 'php/ajaxHandler.php',
                data: {userID: userID, securityQuestion: securityQuestions[securityQuestion], securityAnswer: securityAnswer, action:'getRecoveryMode'},
                beforeSend: function () {
                    $("#loader").show();
                }
            };
            $.ajax(request).done(function (resp) {
                $("#loader").hide();
                var obj = $.parseJSON(resp);
                if (obj.ack == true){
                    globalUserID = obj.userID;
                    $("#passwordRecovery").modal('hide');
                    $("#changePassword").html(obj.content);
                    $("#changePassword").modal('show');
                }
                else{
                    var alerthtml = '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Your given data not matched with database!</div>';
                    $(".alert").alert('close');
                    $(".modal-body").prepend(alerthtml);
                    setTimeout(function () {
                        $(".alert").alert('close');
                    }, 5000);
                }
            });
        }
        else{
            var alerthtml = '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> The fields are required & cannot be empty!</div>';
            $(".alert").alert('close');
            $(".modal-body").prepend(alerthtml);
            setTimeout(function () {
                $(".alert").alert('close');
            }, 5000);
        }
    });
    
    $("#passwordRecovery").on('show.bs.modal',function () {
        $("#userID input").val('');
        $("#securityQuestions select").val('');
        $("#securityAnswers input").val('');
    });

    var passFlag = confirmFlag = false;
    $("#wrap").on("blur","#newPasswd input",function(){
        var passPattern1 = /^.*(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\s\S]{8,12}$/g;
        var passPattern2 = /^.*(?=.*[a-z])(?=.*\d)[\s\S]{8,12}$/g;
        var passPattern3 = /^.*(?=.*[A-Z])(?=.*\d)[\s\S]{8,12}$/g;
        if(!passPattern1.test($(this).val()) && !passPattern2.test($(this).val()) && !passPattern3.test($(this).val())){
            passFlag = false;
            $("#newPasswd").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#newPasswd .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="newPasswdError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            passFlag = true;
            $("#newPasswd").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#newPasswd .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="newPasswdSuccess" class="sr-only success-state">(success)</span>';
            })
        }
    });

    $("#wrap").on('keyup',"#newPasswd input", function(){
        var passPattern1 = /^.*(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\s\S]{8,12}$/g;
        var passPattern2 = /^.*(?=.*[a-z])(?=.*\d)[\s\S]{8,12}$/g;
        var passPattern3 = /^.*(?=.*[A-Z])(?=.*\d)[\s\S]{8,12}$/g;
        if(passPattern1.test($(this).val())){
            passFlag = true;
            $("#passHelper strong").html("Strong!").css({color: "#0000FF"});
        }
        else if (passPattern2.test($(this).val()) || passPattern3.test($(this).val())){
            passFlag = true;
            $("#passHelper strong").html("Good!").css({color: "#00AF33"});
        }
        else{
            passFlag = false;
            $("#passHelper strong").html("Weak or Invalid!").css({color: "#FF0000"});
        }
    });

    $("#wrap").on("blur","#confirmPasswd input",function(){
        var passwords = $("#newPasswd input").val();
        if(!passFlag || $(this).val() != passwords){
            confirmFlag = false;
            $("#confirmPasswd").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#confirmPasswd .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="confirmPasswdError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            confirmFlag = true;
            $("#confirmPasswd").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#confirmPasswd .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="confirmPasswdSuccess" class="sr-only success-state">(success)</span>';
            })
        }
    });
    
    $("#wrap").on("click","#changeSubmit",function () {
        if (!passFlag && !confirmFlag){
            var alerthtml = '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> New password cannot be empty or invalid!</div>';
            $(".alert").alert('close');
            $(".modal-body").prepend(alerthtml);
            setTimeout(function () {
                $(".alert").alert('close');
            }, 5000);
        }
        else{
            var newPassword = $("#newPasswd input").val();
            var request = {
                type: 'post',
                url: 'php/ajaxHandler.php',
                data: {userID:globalUserID, newPasswd:newPassword, action:'setNewPassword'},
                beforeSend:function () {
                    $("#loader").show();
                }
            };
            $.ajax(request).done(function (resp) {
                var obj = $.parseJSON(resp);
                if (obj.ack == true){
                    var alerthtml = '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>'+obj.msg+'</strong></div>';
                    $(".alert").alert('close');
                    $(".modal-body").prepend(alerthtml);
                    setTimeout(function () {
                        $(".alert").alert('close');
                        $("#changePassword").modal('hide');
                    }, 5000);
                }
                else{
                    var alerthtml = '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>'+obj.msg+'</strong></div>';
                    $(".alert").alert('close');
                    $(".modal-body").prepend(alerthtml);
                    setTimeout(function () {
                        $(".alert").alert('close');
                    }, 5000);
                }
            });
        }
    });

});
