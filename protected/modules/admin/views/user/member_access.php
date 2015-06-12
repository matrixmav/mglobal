<?php
$this->breadcrumbs = array(
     
    'Member Access'
);
?>
<form class="form-horizontal" role="form" id="form_admin_reservation" enctype="multipart/form-data" action="/admin/userhasaccess/memberaccess" method="post" onsubmit="return validateForm()">
<div class="col-md-12 form-group">
    <div class="col-md-6">
    <select name="to_email" id="to_email"  class="form-control">
            <option value="">Select Member</option>
            <?php foreach($emailObject as $email){
              if(!empty($mailObject))
              { 
                  $varID = $mailObject->id;
                  }else{ 
                  $varID =  "";
                 }  
                ?>
            <option value="<?php echo $email->id;?>" <?php if($email->id == $varID){?> selected="selected" <?php }?>><?php echo $email->full_name;?></option>
            <?php }?>
        </select>
          </div>
</div>
<div class="col-md-12 form-group">
    <div class="col-md-6">
        <input type="checkbox" name="access[]" id="builder">Builder<br/>
        <input type="checkbox" name="access[]" id="ads">Ads<br/>
        <input type="checkbox" name="access[]" id="package">package<br/>
        <input type="checkbox" name="access[]" id="reports">Reports<br/>
        <input type="checkbox" name="access[]" id="users">Member Management<br/>
        <input type="checkbox" name="access[]" id="mail">Mail<br/>
        <input type="checkbox" name="access[]" id="mail">Member Access<br/>
    </div>
</div>
 
<div class="col-md-12 form-group">
    <label class="col-md-2"></label>
    <div class="col-md-6">
        <input type="submit" class="btn green" name="submit" id="submit" size="60" maxlength="75" class="textBox" value="Submit" />
    </div>
</div> 
</form>
