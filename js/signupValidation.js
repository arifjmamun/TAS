$(document).ready(function(){
    
    $("#signUp").attr('disabled',true);
    var nameFlag = emailFlag = passFlag = confirmFlag = designationFlag = phoneFlag = securityQuestionFlag = false;
    var identityFlag = departmentsFlag = genderFlag = religionFlag = imageFlag = agreeFlag = securityAnswerFlag = false;
    var identityNumber="", identityType="";

    $("#fullName input").on("blur",function(){
        var namePattern = /^[a-zA-Z. '-]{3,40}$/g;
        if(!namePattern.test($(this).val())){
            nameFlag = false;
            $("#fullName").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#fullName .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="fullNameError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            nameFlag = true;
            $("#fullName").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#fullName .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="fullNameSuccess" class="sr-only success-state">(success)</span>';
            })
        }
        $("#regForm").trigger("change");
    });

    $("#emailAddress input").on("blur",function(){
        var emailPattern = /^[+a-zA-Z0-9._]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,9}$/g;
        if(!emailPattern.test($(this).val())){
            emailFlag = false;
            $("#emailAddress").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#emailAddress .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="emailError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            emailFlag = true;
            $("#emailAddress").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#emailAddress .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="emailSuccess" class="sr-only success-state">(success)</span>';
            })
        }
        $("#regForm").trigger("change");
    });

    $("#passwd input").on("blur",function(){
        var passPattern1 = /^.*(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\s\S]{8,12}$/g;
        var passPattern2 = /^.*(?=.*[a-z])(?=.*\d)[\s\S]{8,12}$/g;
        var passPattern3 = /^.*(?=.*[A-Z])(?=.*\d)[\s\S]{8,12}$/g;
        if(!passPattern1.test($(this).val()) && !passPattern2.test($(this).val()) && !passPattern3.test($(this).val())){
            passFlag = false;
            $("#passwd").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#passwd .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="passwdError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            passFlag = true;
            $("#passwd").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#passwd .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="passwdSuccess" class="sr-only success-state">(success)</span>';
            })
        }
        $("#regForm").trigger("change");
    });

    $("#passwd input").keyup(function(){
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
        $("#regForm").trigger("change");
    });

    $("#confirmPasswd input").on("blur",function(){
        var passwords = $("#passwd input").val();
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
        $("#regForm").trigger("change");
    });

    $("#designation input").on("blur",function(){
        var designationPattern = /^[a-zA-z\. \-'_]{3,15}$/g;
        if(!designationPattern.test($(this).val())){
            designationFlag = false;
            $("#designation").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#designation .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="designationError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            designationFlag = true;
            $("#designation").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#designation .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="designationSuccess" class="sr-only success-state">(success)</span>';
            })
        }
        $("#regForm").trigger("change");
    });

    $("#departments select").on("change",function(){
        var valueSelected = $(this).val();
        if(valueSelected == ""){
            departmentsFlag = false;
            $("#departments").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#departments .error-state").remove();
            $("#departments .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="departmentsError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            departmentsFlag = true;
            $("#departments").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#departments .success-state").remove();
            $("#departments .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="departmentsSuccess" class="sr-only success-state">(success)</span>';
            })
        }
        $("#regForm").trigger("change");
    });

    $("#gender select").on("change",function(){
        var valueSelected = $(this).val();
        if(valueSelected == ""){
            genderFlag = false;
            $("#gender").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#gender .error-state").remove();
            $("#gender .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="genderError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            genderFlag = true;
            $("#gender").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#gender .success-state").remove();
            $("#gender .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="genderSuccess" class="sr-only success-state">(success)</span>';
            })
        }
        $("#regForm").trigger("change");
    });

    $("#religion select").on("change",function(){
        var valueSelected = $(this).val();
        if(valueSelected == ""){
            religionFlag = false;
            $("#religion").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#religion .error-state").remove();
            $("#religion .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="religionError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            religionFlag = true;
            $("#religion").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#religion .success-state").remove();
            $("#religion .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="religionSuccess" class="sr-only success-state">(success)</span>';
            })
        }
        $("#regForm").trigger("change");
    });

    $("#phoneNumber input").on("blur",function(){
        var phonePattern = /^[0-9\+]{11,14}$/g;
        if(!phonePattern.test($(this).val())){
            phoneFlag = false;
            $("#phoneNumber").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#phoneNumber .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="phoneNumberError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            phoneFlag = true;
            $("#phoneNumber").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#phoneNumber .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="phoneNumberSuccess" class="sr-only success-state">(success)</span>';
            })
        }
        $("#regForm").trigger("change");
    });

    $("ul#identityOption li").click(function(){
        $("ul#identityOption li").removeClass("active");
        $(this).addClass("active");
        $("#regForm").trigger("change");
    });

    $("#identityNumber input").on("blur",function(){
        var identityPattern = /^[A-Z0-9@]{10,30}$/g;
        if(!identityPattern.test($(this).val())){
            identityFlag = false;
            $("#identityNumber").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#identityNumber .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="identityNumberError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            identityFlag = true;
            $("#identityNumber").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#identityNumber .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="identityNumberSuccess" class="sr-only success-state">(success)</span>';
            });
        }
        $("#regForm").trigger("change");
    });

    $("#securityQuestions select").on("change",function () {
        var valueSelected = $(this).val();
        if(valueSelected == ""){
            securityQuestionFlag = false;
            $("#securityQuestions").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#securityQuestions .error-state").remove();
            $("#securityQuestions .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="securityQuestionsError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            securityQuestionFlag = true;
            $("#securityQuestions").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#securityQuestions .success-state").remove();
            $("#securityQuestions .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="securityQuestionsSuccess" class="sr-only success-state">(success)</span>';
            })
        }
        $("#regForm").trigger("change");
    });

    $("#securityAnswers input").on("blur",function () {
        var valueSelected = $(this).val();
        if(valueSelected == ""){
            securityAnswerFlag = false;
            $("#securityAnswers").removeClass("has-success has-feedback").addClass("has-error has-feedback");
            $("#securityAnswers .error-state").remove();
            $("#securityAnswers .success-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-remove form-control-feedback error-state" aria-hidden="true"></span>\n'+
                    '<span id="securityAnswersError" class="sr-only error-state">(error)</span>';
            })
        }
        else{
            securityAnswerFlag = true;
            $("#securityAnswers").removeClass("has-error has-feedback").addClass("has-success has-feedback");
            $("#securityAnswers .success-state").remove();
            $("#securityAnswers .error-state").remove();
            $(this).after(function(){
                return '<span class="glyphicon glyphicon-ok form-control-feedback success-state" aria-hidden="true"></span>\n'+
                    '<span id="securityAnswersSuccess" class="sr-only success-state">(success)</span>';
            })
        }
        $("#regForm").trigger("change");
    });

    // Load image when browse the image
    var _URL = window.URL || window.webkitURL;
    $("#browseImage").change(function(event) {
        var file, img, height, width;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.')+1).toLowerCase();
        if(ext == 'jpg' || ext == 'jpeg' || ext == 'png'){

            if((file = this.files[0])){
                img = new Image();
                img.onload = function(){
                    height = this.height;
                    width = this.width;
                    if(height == 570 && width == 450){
                        var tmppath = URL.createObjectURL(event.target.files[0]);
                        $("#profileImage").fadeIn("fast").attr('src', tmppath);
                        imageFlag = true;
                    }
                    else{
                        $("#profileImage").attr('src','');
                        $("#browseImage").val('');
                        imageFlag = false;
                        $("#warning").remove();
                        $("#browseImage").after(function(){
                            return '<div class="alert alert-danger" id="warning">\n'+
                                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n'+
                                'Width: 440 px & Height: 444 px Needed! </div>';
                        })
                    }
                }
                img.src = _URL.createObjectURL(file);
            }
        }
        else{
            $("#profileImage").attr('src','');
            $("#browseImage").val('');
            imageFlag = false;
            $("#warning").remove();
            $("#browseImage").after(function(){
                return '<div class="alert alert-danger" id="warning">\n'+
                    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n'+
                    'Only JPG, JPEG, PNG file allowed!</div>';
            })
        }
        $("#regForm").trigger("change");
    });

    $("#agreeTerms").on("click",function(){
        if($(this).is(':checked')){
            agreeFlag = true;
        }
        else
            agreeFlag = false;

        $("#regForm").trigger("change");
    });

    $("#regForm").change(function(){
        if(!nameFlag || !emailFlag || !passFlag || !confirmFlag || !designationFlag || !phoneFlag || !identityFlag || !departmentsFlag || !genderFlag || !religionFlag || !imageFlag || !agreeFlag || !securityQuestionFlag || !securityAnswerFlag){
            $("#signUp").attr('disabled',true);
        }
        else{
            $("#signUp").attr('disabled',false);
        }
    });

    $("#regForm").submit(function(){
        identityType = $("ul#identityOption li.active a").html()+"@";
        identityNumber = $("#identityNumber input").val();
        $("#identityNumber input").val('');
        var val = $("#identityNumber input").val(identityType+identityNumber);
    });

});