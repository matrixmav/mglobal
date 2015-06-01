<!DOCTYPE html>
<html>
<head>
<title><?php echo $builderObjectmeta->header->meta_title;?></title>
<link href="/user/template/<?php echo $builderObjectmeta->folderpath; ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


<link href="/user/template/<?php echo $builderObjectmeta->folderpath; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/user/template/<?php echo $builderObjectmeta->folderpath; ?>/css/responsiveslides.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="/user/template/<?php echo $builderObjectmeta->folderpath; ?>/js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 1000,
			      });
			});
		  </script>



 
<script type="text/javascript">
    
jQuery(document).ready(function() { 
    dataString = 'fetchmenu';
    $.ajax({
        type: "GET",
        url: "/BuildTemp/fetchmenu",        
        data: dataString,
        cache: false,
        success: function(html) {
//            alert(html);
            document.getElementById("head_menu").innerHTML = html;
        }
    });
    $.ajax({
        type: "GET",
        url: "/BuildTemp/fetchlogo",
        data: dataString,
        cache: false,
        success: function(html) {
//            alert(html);
            document.getElementById("logo").innerHTML = html;
        }
    });
    var url = document.URL;
    var str = url.split('/');
    var dValue = $("#defaultPage").val();
    if (str[5] != '' && str[5] != 'undefined') {
        var pageID = str[5];
    } else {
        var pageID = dValue;
    }

    dataString = 'fetchContent=yes&page_id=' + pageID;
    $.ajax({
        type: "GET",
        url: "/BuildTemp/pagecontent",
        data: dataString,
        cache: false,
        success: function(html) {
            document.getElementById("content").innerHTML = html;
        }
    });
});


function validation() {
    $("#name_error").html("");
    if ($("#name").val() == "") {
        $("#name_error").html("Please enter your name.");
        $("#name").focus();
        return false;
    }

    $("#email_error").html("");
    if ($("#email").val() == "") {
        $("#email_error").html("Please enter email.");
        $("#email").focus();
        return false;
    }
    var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
        $("#email_error").html("Enter valid email address ");
        $("#email").focus();
        return false;
    }
    $("#message_error").html("");
    if ($("#message").val() == "") {
        $("#message_error").html("Please enter your message.");
        $("#message").focus();
        return false;
    } else {
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        var dataString = 'name=' + name + '&email=' + email + '&message=' + message;
        $.ajax({
            type: "GET",
            url: "/BuildTemp/submitform",
            data: dataString,
            cache: false,
            success: function(html) {
                if (html == 1)
                    document.getElementById("msg").innerHTML = "Your query has been submitted successfully.";
            }
        });
    }
}
</script>
</head>	
<body>
<div id="header">

<?php echo $builderObject->temp_header;?>
    <input type="hidden" id="defaultPage" value="<?php echo (!empty($userpages1Object))? $userpages1Object->id : "";?>">   
</div>

<div id="container">
   <?php echo $builderObject->temp_body;?>  
</div>

<div id="footer">
  <?php echo $builderObject->temp_footer;?>   
</div>
</body>
</html>

<script type="text/javascript" src="js/tsc_jqcarousel.js"></script>
<script type="text/javascript">
  $(function() {jQuery('.tsc_carousel_hor .carousel').jcarousel({scroll:1});});
</script>
