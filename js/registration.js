  function validateFrm() {
        
        if($("#sponsorIdExistedErrorFlag").val()==1){
           $("#sponsor_id_error").html("Not Existed.");
           $("#sponsor_id").focus(); 
           return false;
        }        
        
        if($("#nameExistedErrorFlag").val()==1){
           $("#name_error").html("Existed.");
           $("#name").focus(); 
           return false;
        }
        
        if ($("#sponsor_id").val() == "") {
            $("#sponsor_id_error").html("Get Sponsor Id");
            $("#sponsor_id").focus();   
            return false;
        }

        $("#sponsor_id_error").html("");
        if ($("#sponsor_id").val() == "") {
            $("#sponsor_id_error").html("Get Sponsor Id");
            $("#sponsor_id").focus();            
            return false;
        }
        
        $("#position_error").html("");
        if ($("#position:checked").length == 0) {                        
            $("#position_error").html("Select Position");
            $("#position").focus();            
            return false;
        }
        
        $("#name_error").html("");
        if ($("#name").val() == "") {
            $("#name_available").html("");            
            $("#name_error").html("Enter User Name");
            $("#name").focus();            
            return false;
        }
       
        if ($("#name").val().match(/\s/g)) {  
            $("#name_available").html("");
            $("#name_error").html("Username should not contain blank spaces.");
            $("#name").focus();            
            return false;
        }
        
        if ($("#name").val().length < 5) {
            $("#name_error").html("User name should be min 5 characters.");
            $("#name").focus();            
            return false;
        }        
        
        if($("#name").val().length > 8 ){            
            $("#name_available").html("");
            $("#name_error").html("User name should be max 8 characters.");
            $("#name").focus();            
            return false;
        }        
        
        $("#full_name_error").html("");
        if ($("#full_name").val() == "") {
            $("#full_name_error").html("Enter User Full Name");
            $("#full_name").focus();   
            return false;
        }  
        
        if ($("#full_name").val().length < 5) {
            $("#full_name_error").html("User full name should be min 5 characters");
            $("#full_name").focus();   
            return false;
        }
        
        $("#full_name_error").html("");
        var letters = /^[A-Za-z]+$/;
        if ( ! $("#full_name").val().match(letters)){
            $("#full_name_error").html("Only alphabet characters allow");           
            return false;
        }
        
        /* email validation */
        $("#email_error").html("");
        if ($("#email").val() == "") {
            $("#email_error").html("Enter User Email");
            $("#email").focus();
            return false;
        }

        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email.value)) {
            $("#email_error").html("Enter valid email address.");
            $("#email").focus();
            return false;
        }
        
        $("#email_error").html("");
        if($("#emailExistedErrorFlag").val() == 1){
           $("#email_error").html("Existed.");
           $("#email").focus(); 
           return false;
        }
        
        /* end here */

        $("#date_error").html("");
        if ($("#d").val() == "" || $("#m").val() == "" || $("#y").val() == "" ) {
            $("#date_error").html("Enter Birth Date");
            $("#d").focus();
            return false;
        }    

        $("#country_id_error").html("");
        if ($("#country_id").val() == "") {
            $("#country_id_error").html("Please Select Country Name");
            $("#country_id").focus();   
            return false;
        }   

        /* Phone Number Validation  */
        $("#phone_error").html("");
        if ($("#phone").val() == "") {
            $("#phone_error").html("Enter Mobile Number");
            $("#phone").focus();
            return false;
        }
        

        var phone = document.getElementById('phone');
        var filter = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

        if (!filter.test(phone.value)) {
            $("#phone_error").html("Enter valid phone number ");
            $("#phone").focus();  
            return false;
        }

        /*$("#password_error").html("");
        if ($("#password").val() == "") {
            $("#password_error").html("Enter Password");
            $("#password").focus();
            return false;
        }
        

    var regExp = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    var pwd = $("#password").val();
    if (!regExp.test(pwd)) {
        $("#password_error").html("Enter atleast 6 characters with one numeric digit, one lowecase letter and one uppercase letter.");
            $("#password_name").focus();   
            return false;
        }
        
        if ($("#confirm_password").val() == "") {
            $("#confirm_password_error").html("Enter Confirm Password");
            $("#confirm_password").focus();
            return false;
        }
        
    var pwd = $("#confirm_password").val();
    if (!regExp.test(pwd)) {
        $("#confirm_password_error").html("Enter atleast 6 characters with one numeric digit, one lowecase letter and one uppercase letter.");
            $("#confirm_password").focus();
            return false;
        }

        if ($("#password").val() != $("#confirm_password").val()) {
            $("#confirm_password_error").html("Please check that you've entered and confirmed your password");
            $("#confirm_password").focus();
            return false;
        }*/

        $("#position_error").html("");
        if ($("#position").val() == "") {
            $("#position_error").html("Select Positioin");
            $("#position").focus();
            return false;
        }
        
    }
    function isUserExisted() {
        $("#name_error").html("");
        $("#name_available").html("");
        if ($("#name").val().match(/\s/g)) {           
            $("#name_error").html("Username should not contain blank spaces.");
            $("#name").focus();            
            return false;
        }else if($("#name").val().length < 5 ){
            $("#name_error").html("User name should be min 5 characters.");
            $("#name").focus();            
            return false;
        }
       else{
        $.ajax({
            type: "post",
            url: "/user/isuserexisted",
            data: "username=" + $("#name").val(),
            success: function (msg) {
                $("#name_error").html("");
               $("#name_available").html("");
                $("#nameExistedErrorFlag").val("0");
                if(msg == 1){
                    $("#name_error").html("User Name Already Existed.");
                    $("#nameExistedErrorFlag").val(1);
                } else {
                    $("#name_available").html("User Name Available!!!");
                }
            }
        });
    }
    }
    function getCountryCode(id){ 
         $.ajax({
            type: "post",
            url: "/country/getcountry",
            data: "id=" + id,
            success: function (msg) { 
                $("#country_code").val("");
                if(msg){
                    $("#country_code").val(msg);
                }
            }
        });
    }

    function isEmailExisted() {
        
        $.ajax({
            type: "post",
            url: "/user/isemailexisted",
            data: "email=" + $("#email").val(),
            success: function (msg) {
                $("#email_error").html("");
                $("#emailExistedErrorFlag").val("0");
                if(msg == 1){
                    $("#email_error").html("Existed!!!");
                    $("#emailExistedErrorFlag").val(1);
                }
            }
        });
    }
    
    function isSponsorExisted() {   
        $.ajax({
            type: "post",
            url: "/user/issponsorexisted",
            data: "sponsor_id=" + $("#sponsor_id").val(),
            success: function (msg) {
                $("#sponsor_id_error").html("");
                $("#sponsorIdExistedErrorFlag").val(0);
                if(msg == 0){
                    $("#sponsor_id_error").html("Sponsor Not Existed!!!");
                    $("#sponsorIdExistedErrorFlag").val(1);    
                }
            }
        });
    }