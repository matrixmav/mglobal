<?php
$this->breadcrumbs = array(
    'Build Website',
);
?>
<div class="col-md-12 col-sm-12">
    <a class="btn red publish" href="builder?o=<?php echo base64_encode(Yii::app()->session['orderID']);?>&u=<?php echo base64_encode(Yii::app()->session['userid']);?>&t=<?php echo base64_encode(Yii::app()->session['templateID']);?>">Publish Your Website</a>
</div>
<div class="col-md-7 col-sm-7">
    <form action="" method="post" class="form-horizontal" onsubmit="return validation();">
         <?php if(!empty($_GET['m'])){?><div class="error" id="error_msg">Invalid Password</div><?php }?>

        <fieldset>
            <legend>Build Website</legend>              
             <div class="form-group">
                <label class="col-lg-4 control-label" for="master">Master Pin<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" id="master_pin" class="form-control" name="master_pin">
                    <div id="master_pin_error" class="form_error"></div>
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
    
    function validation() {      
        
        var masterPin = requiredField('master_pin', 'master_pin_error', 'Enter master pin');       
        if (masterPin == false) {            
            return false;
        }        
    }
         
</script>

