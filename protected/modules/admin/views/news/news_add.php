<?php
$this->breadcrumbs = array(
    'News Add',
);
?>
<div class="col-md-7 col-sm-7">
    <?php if ($error) { ?><div class="error"><?php echo $error; ?></div><?php } ?>
    <?php if ($success) { ?><div class="success"><?php echo $success; ?></div><?php } ?>
    <div class="portlet box orange ">
 <div class="portlet-title">
							<div class="caption">
								Add News
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
                    <textarea class="form-control" value="" name="news" id="news" ></textarea>
                    <span id="news_error" class="clrred"></span>
                </div>
            </div>
            </div>
        </fieldset>
         <div class="form-actions right pad10">                     
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
