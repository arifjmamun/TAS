$(document).ready(function () {
    $("#inputSimple").keyup(function () {
        var passPattern1 = /^.*(?=.*[a-z])(?=.*[A-Z?])(?=.*\d)[\s\S]{8,12}$/g;
        var passPattern2 = /^.*(?=.*[a-z])(?=.*\d)[\s\S]{8,12}$/g;

        if (passPattern1.test($(this).val())){
            $("#helper").html("Strong");
        }
        else if (passPattern2.test($(this).val())){
            $("#helper").html("Good");
        }
        else{
            $("#helper").html("Weak");
        }

    });
    // $("#inputSimple").blur(function () {
    //     var passPattern1 = /^.*(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\s\S]{8,12}$/g;
    //     var passPattern2 = /^.*(?=.*[a-z])(?=.*\d)[\s\S]{8,12}$/g;
    //
    //     if (passPattern1.test($(this).val())){
    //         $("#helper").html("Strong");
    //     }
    //     else if (passPattern2.test($(this).val())){
    //         $("#helper").html("Good");
    //     }
    //     else{
    //         $("#helper").html("Weak");
    //     }
    //
    // })

});