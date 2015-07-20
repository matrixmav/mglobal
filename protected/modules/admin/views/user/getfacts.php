<?php
$this->breadcrumbs = array(
     
    'Site Statistics',
);
?>
<div class="col-md-6 col-sm-6">
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>
     <div class="portlet box orange   ">
         <div class="portlet-title">
	<div class="caption">
	Site Statistics
	</div>
    </div>
                <form class="form-horizontal form-without-legend" method="post" name="LoginForm" id=LoginForm" role="form"  action="/SiteStatitics/getfacts" onsubmit="return validation()">
                <div class="form-body">
                    <fieldset>
            <div class="form-body">
                <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Total Registration<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="total_registration" class="form-control" name="total_registration" value="<?php echo !(empty($siteObject))? $siteObject->total_registration:"" ;?>">
                    <div id="total_registration_error_msg" class="form_error"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Package Bought<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="package_bought" class="form-control" name="package_bought" <?php echo !(empty($siteObject))? $siteObject->package_bought:"" ;?>>
                    <div id="package_bought_error_msg" class="form_error"></div>
                </div>
            </div>
             <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Commission Given<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="commission_given" class="form-control" name="commission_given" <?php echo !(empty($siteObject))? $siteObject->commission_given:"" ;?>>
                    <div id="commission_given_error_msg" class="form_error"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Project Completed<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="project_completed" class="form-control" name="project_completed" <?php echo !(empty($siteObject))? $siteObject->total_project:"" ;?>>
                    <div id="project_completed_error_msg" class="form_error"></div>
                </div>
            </div>
                </div>
                </div>
                    </fieldset>
                <div class="form-actions right">                     
                   <input type="submit" name="submit" value="Submit" class="btn orange ">
                 
            </div>
                
              </form>
            </div>
</div>
<script>
 function validation()
    {
        $("#total_registration_error_msg").html("");
        if($("#total_registration").val()=='')
        {
            $("#total_registration_error_msg").html("Please enter registration.");
            $("#total_registration").focus();
            return false;
        }
         $("#package_bought_error_msg").html("");
         if($("#package_bought").val()=='')
        {
            $("#package_bought_error_msg").html("Please enter package purchased.");
            $("#package_bought").focus();
            return false;
        }
        $("#commission_given_error_msg").html("");
        if($("#commission_given").val()=='')
        {
            $("#commission_given_error_msg").html("Please enter commission given to users.");
            $("#commission_given").focus();
            return false;
        }
        $("#project_completed_error_msg").html("");
        if($("#project_completed").val()=='')
        {
            $("#project_completed_error_msg").html("Please enter completed projects");
            $("#project_completed").focus();
            return false;
        }
        
    }
</script>