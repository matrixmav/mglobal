<?php
 $this->breadcrumbs = array(
    'Add Cash',
);
?>
<link rel="stylesheet" type="text/css" href="/metronic/assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/metronic/assets/plugins/select2/select2-metronic.css"/>
<div class="col-md-6 col-sm-6">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
       <div class="portlet box orange ">
    <div class="portlet-title">
							<div class="caption">
								Add Cash
							</div>
    </div>
 <div class="portlet-body form">
    <form class="form-horizontal" role="form" method="post" action="" autocomplete="off" onsubmit="return validationfrom();">
        <fieldset> 
            <div class="form-body">
                <div class="form-group">
                    <label for="paid_amount" class="col-lg-4 control-label">Amount<span class="require"> * $</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="paid_amount" name="paid_amount"  class="form-control" value="<?php echo (!empty($_POST['paid_amount']))? $_POST['paid_amount'] : "" ?>">
                       <span id="email_error" style="color:red"></span>
                    </div>
                    
                </div>
            
               <div class="form-group">
                    <label for="master_pin" class="col-lg-4 control-label">Master Pin<span class="require"> *</span></label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" id="master_pin" name="master_pin"  class="form-control">
                       <span id="master_pin_error" style="color:red"></span>
                    </div>
                    
                </div>
            </div>
            </fieldset>
        <div class="form-actions right">                     
                
                 <input type="submit"  name="transfer" id="transfer" class="btn orange" value="Add" onClick="return validationfrom();"/>                     
            </div>
            
    </form>
 </div>
       </div>
</div>
<script type="text/javascript" src="/metronic/assets/plugins/select2/select2.min.js"></script>
<style>
        #s2id_search_username{ width: 100% !important;}
</style>
<script>
    function validationfrom()
{
     $('#email_error').html("");  
    if($('#paid_amount').val()== '')
    {
       $('#email_error').html("Amount can not be blank"); 
       return false;
    }
     $('#email_error').html(""); 
    if($('#paid_amount').val() < 0 || $('#paid_amount').val() == '0')
    {
       $('#email_error').html("Invalid amount."); 
       return false;
    }
   $('#master_pin_error').html(""); 
    if($('#master_pin').val()== '')
    {
       $('#master_pin_error').html("Please enter master pin."); 
       return false;
    }
    
   
 }
 function setValue()
 {
     var price  = $('#paid_amount').val();
     $('#ppamount').val(price);
 }
</script>
