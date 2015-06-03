<!DOCTYPE html>
<html>
<head>
<title><?php echo $builderObjectmeta->header->meta_title;?></title>

<?php foreach($builderObjectCss as $builderObjectListCss){ ?>
    <link href="/user/template/<?php echo $builderObjectmeta->folderpath; ?>/css/<?php echo $builderObjectListCss->name ?>" rel="stylesheet" type="text/css" media="all" />
<?php } ?>
    


<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 
<script type="text/javascript">
    
$(document).ready(function() { 
    dataString = 'fetchmenu';
    $.ajax({
        type: "GET",
        url: "/BuildTemp/fetchmenu",        
        data: dataString,
        cache: false,
        success: function(html) {
           //alert(html);
            document.getElementById("head_menu").innerHTML = html;
        }
    });
    $.ajax({
        type: "GET",
        url: "/BuildTemp/fetchlogo",
        data: dataString,
        cache: false,
        success: function(html) {
            //alert(html);
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
              //  alert(html);
            document.getElementById("content111").innerHTML = html;
        }
    });
    
    dataString = 'fetchContent=yes&page_id=' + pageID;
    $.ajax({
        type: "GET",
        url: "/BuildTemp/pagefooter",
        data: dataString,
        cache: false,
        success: function(html) {
               //alert(html);
            document.getElementById("footer").innerHTML = html;
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

<?php foreach($builderObjectJs as $builderObjectListJs){ ?>
    <script src="/user/template/<?php echo $builderObjectmeta->folderpath; ?>/js/<?php echo $builderObjectListJs->name ?>" ></script>
<?php } ?>
    
</head>	
<body>
    <div class="main-bg">  
      <div id="header">         
            <?php echo stripslashes($builderObject->temp_header);  ?>
          <input type="hidden" id="defaultPage" value="<?php //echo (!empty($userpages1Object))? stripslashes($userpages1Object->id) : "";?>">   
     
          </div>

      <div id="content111">
          <?php echo $builderObject->temp_body ;?> 
      </div>

      <div id="footer">
        <?php echo $builderObject->temp_footer ;?>   
      </div>
    </div>    
</body>
</html>
