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
if(!empty($success)){
    echo "<p class='success'>".$success."</p>";
}

?>
<form class="form-horizontal" role="form" id="form_admin_reservation" enctype="multipart/form-data" action="/admin/userhasaccess/memberaccess?id=<?php echo (!empty($_GET) && $_GET['id']!='') ? $_GET['id']: "";?>" method="post" onsubmit="return validateForm()">
<input type="hidden" id="admin_id" class="form-control" name="admin_id" readonly="readonly" value="<?php echo (!empty($_GET) && $_GET['id']!='') ? $_GET['id']: "0";?>">
<div class="col-md-12 form-group">
    <label class="col-md-2">User Name: </label>
    <div class="col-md-6">
        <p><?php echo $emailObject->full_name; ?></p>
        <span id="first_name_error" style="color:red"></span>
    </div>
</div>
<div class="col-md-12 form-group">
    <label class="col-md-2">Choose Permission: </label>
    <div class="col-md-6">
        <input type="checkbox" name="access[]" value="builder" <?php if(in_array('builder',$accessArr)){?> checked="checked" <?php }?>>Builder<br/>
        <input type="checkbox" name="access[]" value="ads" <?php if(in_array('ads',$accessArr)){?> checked="checked" <?php }?>>Ads<br/>
        <input type="checkbox" name="access[]" value="package" <?php if(in_array('package',$accessArr)){?> checked="checked" <?php }?>>package<br/>
        <input type="checkbox" name="access[]" value="reports" <?php if(in_array('reports',$accessArr)){?> checked="checked" <?php }?>>Reports<br/>
        <input type="checkbox" name="access[]" value="user" <?php if(in_array('user',$accessArr)){?> checked="checked" <?php }?>>Member Management<br/>
        <input type="checkbox" name="access[]" value="mail" <?php if(in_array('mail',$accessArr)){?> checked="checked" <?php }?>>Mail<br/>
        <input type="checkbox" name="access[]" value="memberaccess" <?php if(in_array('memberaccess',$accessArr)){?> checked="checked" <?php }?>>Member Access<br/>
        <input type="checkbox" name="access[]" value="wallet" <?php if(in_array('wallet',$accessArr)){?> checked="checked" <?php }?>>Wallet<br/>
        <input type="checkbox" name="access[]" value="geneology" <?php if(in_array('geneology',$accessArr)){?> checked="checked" <?php }?>>Geneology<br/>
       <input type="checkbox" name="access[]" value="document" <?php if(in_array('document',$accessArr)){?> checked="checked" <?php }?>>document<br/>
       <input type="checkbox" name="access[]" value="testimonial" <?php if(in_array('testimonial',$accessArr)){?> checked="checked" <?php }?>>Testimonial<br/>
       <input type="checkbox" name="access[]" value="package_list" <?php if(in_array('package_list',$accessArr)){?> checked="checked" <?php }?>>Package List<br/>
       <input type="checkbox" name="access[]" value="package_add" <?php if(in_array('package_add',$accessArr)){?> checked="checked" <?php }?>>Package Add<br/>
       <input type="checkbox" name="access[]" value="ads_add" <?php if(in_array('ads_add',$accessArr)){?> checked="checked" <?php }?>>Ads Add<br/>
       <input type="checkbox" name="access[]" value="ads_list" <?php if(in_array('ads_list',$accessArr)){?> checked="checked" <?php }?>>Ads List<br/>
       
    </div>
</div>
 
<div class="col-md-12 form-group">
    <label class="col-md-2"></label>
    <div class="col-md-6">
        <input type="submit" class="btn green" name="submit" id="submit" size="60" maxlength="75" class="textBox" value="Submit" />
    </div>
</div> 
</form>
