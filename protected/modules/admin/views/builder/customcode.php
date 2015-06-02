<?php
$this->breadcrumbs = array(
    'Custom Code',
);
?>
<div class="col-md-7 col-sm-7" id="test">
        <a class="btn btn-primary" href="/admin/BuildTemp/templateheaderedit?id=<?php echo $customcode->id;?>">Header Edit</a>&nbsp;&nbsp;<a class="btn btn-info" href="/admin/BuildTemp/templatebodyedit?id=<?php echo $customcode->id;?>">Body Edit</a>&nbsp;&nbsp;<a class="btn btn-success" href="/admin/BuildTemp/templatefooteredit?id=<?php echo $customcode->id;?>">Footer Edit</a>&nbsp;&nbsp;<a class="btn btn-warning" href="/admin/BuildTemp/customcode?id=<?php echo $customcode->id;?>" >Custom CSS/JS</a>

    <?php if($error){?><div class="error" id="error_msg"><?php echo $error;?></div><?php }?>
    <?php if($success){?><div class="success" id="error_msg"><?php echo $success;?></div><?php }?>     

    <form action="/admin/BuildTemp/customcode?b_id=<?php echo $customcode->id; ?>&id=<?php echo $_GET['id']; ?>" method="post" class="form-horizontal" >
        <fieldset>

            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Custom CSS</label>
                <div class="col-lg-8">
                    <textarea id="custom_css" class="form-control" name="custom_css" style="width: 482px; height: 248px;"><?php echo (!empty($customcode->custom_css)) ? stripcslashes($customcode->custom_css) : ""; ?></textarea>                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Custom JS</label>
                <div class="col-lg-8">
                    <textarea id="custom_js" class="form-control" name="custom_js" style="width: 482px; height: 248px;"><?php echo (!empty($customcode->custom_js)) ? stripcslashes($customcode->custom_js) : ""; ?></textarea>
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