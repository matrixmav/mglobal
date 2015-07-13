<?php
$this->breadcrumbs = array(
    'News Add',
);
?>
<div class="col-md-7 col-sm-7">
    <?php if ($error) { ?><div class="error"><?php echo $error; ?></div><?php } ?>
    <?php if ($success) { ?><div class="success"><?php echo $success; ?></div><?php } ?>


    <form action="" method="post" class="form-horizontal" onsubmit="return validateFrm();">

        <fieldset>
            <legend>Add News</legend>
            <input type="hidden" id="admin" name="admin" value="1">
            <input type="hidden" id="social" name="social" value="">
            <div class="form-group">
                <label for="firstname" class="col-lg-4 control-label">News Description<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" value="" name="news" id="news">
                    <span id="news_error" class="clrred"></span>
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
 function validateFrm(){ 
  if($('#news').val()=='')
  {
    $('#news_error').html('Please enter news content'); 
    return false;
  }
}
</script>    
