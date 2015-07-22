<?php
$this->breadcrumbs = array(
     
    'News Edit',
);
 
?>
<div class="col-md-12">
 
    
<div class="col-md-7 col-sm-7">
    <?php if ($error) { ?>	<p class="error-2" id="error_msg"><i class="fa fa-times-circle icon-error"></i><span class="span-error-2"><?php echo $error; ?></span></p><?php } ?>
    
    
    <?php if ($success) { ?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $success; ?></span></p><?php } ?>
<div class="portlet box orange ">
<div class="portlet-title">
							<div class="caption">
								Edit News
							</div>
    </div>
    <div class="portlet-body form">
    <form action="" method="post" class="form-horizontal" onsubmit="return validateFrm();">

        <fieldset>
            <div class="form-body">
            <input type="hidden" id="admin" name="admin" value="1">
            <input type="hidden" id="social" name="social" value="">
            <div class="form-group">
                <label for="firstname" class="col-lg-4 control-label">News Description<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea class="form-control" name="news" id="news" cols="30" rows="10" style="height: 234px; width: 494px;"><?php echo (!empty($newsObject)) ? $newsObject->news : "" ;?></textarea>
                     <span id="news_error" class="clrred"></span>
                </div>
            </div>
            </div>
        </fieldset>
        <div class="form-actions right">                     
               <input type="submit" name="submit" value="Submit" class="btn orange">
                 
            </div>
        
    </form>
</div>
</div>
</div>


<script type="text/javascript">
 function validateFrm(){ 
  if($('#news').val()=='')
  {
    $('#news_error').html('Please enter news content'); 
    return false;
  }
}
</script>   