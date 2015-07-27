<?php
$this->breadcrumbs = array(
    'Custom Code',
);
?>
<div class="col-md-6 col-sm-6" id="test">
    <div class="row">
    <div class="actionBtn"><a class="btn btn-primary" href="/admin/BuildTemp/templateheaderedit?id=<?php echo $customcode->id;?>">Header Edit</a></div>
            &nbsp;&nbsp;
            <div class="actionBtn"><a class="btn btn-info" href="/admin/BuildTemp/templatebodyedit?id=<?php echo $customcode->id;?>">Body Edit</a></div>
            &nbsp;&nbsp;
           <div class="actionBtn"> <a class="btn btn-success" href="/admin/BuildTemp/templatefooteredit?id=<?php echo $customcode->id;?>">Footer Edit</a></div>&nbsp;&nbsp;
            <div class="actionBtn"><a class="btn btn-warning" href="/admin/BuildTemp/customcode?id=<?php echo $customcode->id;?>" >Custom CSS/JS</a></div>
    </div>
    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>     
     <div class="portlet box orange   ">
 <div class="portlet-title">
							<div class="caption">
								
							</div>
    </div>
   <div class="portlet-body form">
    <form action="/admin/BuildTemp/customcode?b_id=<?php echo $customcode->id; ?>&id=<?php echo $_GET['id']; ?>" method="post" class="form-horizontal" >
        <fieldset>
 <div class="form-body">
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Custom CSS</label>
                <div class="col-lg-7">
                    <textarea id="custom_css" class="form-control" name="custom_css" style=" height: 248px;"><?php echo (!empty($customcode->custom_css)) ? stripcslashes($customcode->custom_css) : ""; ?></textarea>                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Custom JS</label>
                <div class="col-lg-7">
                    <textarea id="custom_js" class="form-control" name="custom_js" style=" height: 248px;"><?php echo (!empty($customcode->custom_js)) ? stripcslashes($customcode->custom_js) : ""; ?></textarea>
                </div>
            </div>

        </fieldset>
</div>
            
            <div class="form-actions right">                     
                 <input type="submit" name="submit" value="Submit" class="btn orange">
                 
            </div>
       
    </form>
</div>
     </div>