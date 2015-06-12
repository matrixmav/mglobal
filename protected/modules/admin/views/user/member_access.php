<?php
$this->breadcrumbs = array(
     
    'Member Access'
);
?>
<?php 
if(!empty($error)){
    echo "<p class='error'>".$error."</p>";
}

?>
<?php 
if(!empty($error)){
    echo "<p class='success'>".$success."</p>";
}

?>
<form class="form-horizontal" role="form" id="form_admin_reservation" enctype="multipart/form-data" action="/admin/userhasaccess/memberaccess" method="post" onsubmit="return validateForm()">
<div class="col-md-12 form-group">
    <div class="col-md-6">
    <select name="admin_id" id="admin_id"  class="form-control">
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
        <input type="checkbox" name="access[]" value="builder">Builder<br/>
        <input type="checkbox" name="access[]" value="ads">Ads<br/>
        <input type="checkbox" name="access[]" value="package">package<br/>
        <input type="checkbox" name="access[]" value="reports">Reports<br/>
        <input type="checkbox" name="access[]" value="user">Member Management<br/>
        <input type="checkbox" name="access[]" value="mail">Mail<br/>
        <input type="checkbox" name="access[]" value="memberaccess">Member Access<br/>
    </div>
</div>
 
<div class="col-md-12 form-group">
    <label class="col-md-2"></label>
    <div class="col-md-6">
        <input type="submit" class="btn green" name="submit" id="submit" size="60" maxlength="75" class="textBox" value="Submit" />
    </div>
</div> 
</form>
