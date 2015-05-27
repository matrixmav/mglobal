<?php
$this->breadcrumbs = array(
    'Template' => array('buildtemp/templates'),
    'Page Add',
);
?>
<div class="col-md-7 col-sm-7" id="test">
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
    <?php if(!empty($userpagesObject)){?>
    <?php foreach($userpagesObject as $page){?><a href="/buildtemp/pagedit?page_id=<?php echo $page->id; ?>"><?php echo $page->page_name; ?></a><?php }?>
    <?php }else{ ?>
    <a href="/buildtemp/userinput">Page1</a>&nbsp;&nbsp;<a href="/buildtemp/userinput">Page2</a>&nbsp;&nbsp;<a href="/buildtemp/userinput">Page3</a>&nbsp;&nbsp;<a href="/buildtemp/userinput">Page4</a>
    <?php }?>
    <form action="/admin/buildtemp/userinput" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">
     
        <fieldset>
            <legend>Add Pages</legend>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Page Title<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input id="template_title" type="text" class="form-control" name="pages[template_title]">
                    <span id="template_title_error"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Header Code<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="editor1" class="form-control" name="pages[page_content]" style="width: 482px; height: 248px;"></textarea>
                    <span id="header_code_error"></span>
                </div>
            </div>
            
          </fieldset>

    <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="submit" name="submit" value="Submit" class="btn red">
                 
            </div>
        </div>
    </form>
</div>




<script type="text/javascript">
    function validation()
    {
      $("#cssfolder_error").html("");
      if ($("#cssfolder").val() == "") {
      $("#cssfolder_error").html("Please upload css zip folder.");
      $("#cssfolder").focus();            
      return false;
    }
    
    $("#screenshot_error").html("");
      if ($("#screenshot").val() == "") {
      $("#screenshot_error").html("Please upload template screenshot.");
      $("#screenshot").focus();            
      return false;
    }
     
      $("#category_error").html("");
      if ($("#category").val() == "") {
      $("#category_error").html("Please select template category");
      $("#category").focus();            
      return false;
    }
     $("#template_title_error").html("");
      if($("#template_title").val() == "") {
      $("#template_title_error").html("Please enter template title");
      $("#template_title").focus();            
      return false;
    }
      $("#header_code_error").html("");
      if ($("#header_code").val() == "") {
      $("#header_code_error").html("Please enter Header Code");
      $("#header_code").focus();            
      return false;
    }
    $("#header_code_error").html("");
      if ($("#body_code").val() == "") {
      $("#header_code_error").html("Enter Body Code");
      $("#body_code").focus();            
      return false;
    }
     $("#header_code_error").html("");
      if ($("#footer_code").val() == "") {
      $("#header_code_error").html("Enter Footer Code");
      $("#footer_code").focus();            
      return false;
    }
     
    }
    
    </script>
     
     
