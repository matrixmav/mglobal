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
<form class="form-horizontal" role="form" id="form_admin_reservation" enctype="multipart/form-data" action="/admin/UserHasAccess/memberaccess?id=<?php echo (!empty($_GET) && $_GET['id']!='') ? $_GET['id']: "";?>" method="post" onsubmit="return validateForm()">
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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="ads_add" <?php if(in_array('ads_add',$accessArr)){?> checked="checked" <?php }?>>Ads Add<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="ads_list" <?php if(in_array('ads_list',$accessArr)){?> checked="checked" <?php }?>>Ads List<br/>
        <br/>
        <input type="checkbox" name="access[]" value="package" <?php if(in_array('package',$accessArr)){?> checked="checked" <?php }?>>package<br/>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="package_list" <?php if(in_array('package_list',$accessArr)){?> checked="checked" <?php }?>>Package List<br/>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="package_add" <?php if(in_array('package_add',$accessArr)){?> checked="checked" <?php }?>>Package Add<br/>
         <br/>
        <input type="checkbox" name="access[]" value="reports" <?php if(in_array('reports',$accessArr)){?> checked="checked" <?php }?>>Reports<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="userreport" <?php if(in_array('userreport',$accessArr)){?> checked="checked" <?php }?>>User Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reportaddress" <?php if(in_array('reportaddress',$accessArr)){?> checked="checked" <?php }?>>Address Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reportsponsor" <?php if(in_array('reportsponsor',$accessArr)){?> checked="checked" <?php }?>>Sponsor Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reportpackage" <?php if(in_array('reportpackage',$accessArr)){?> checked="checked" <?php }?>>Package Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reportverification" <?php if(in_array('reportverification',$accessArr)){?> checked="checked" <?php }?>>Verification Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reporttransaction" <?php if(in_array('reporttransaction',$accessArr)){?> checked="checked" <?php }?>>Transaction Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reportsocial" <?php if(in_array('reportsocial',$accessArr)){?> checked="checked" <?php }?>>Social Profile Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reportcontact" <?php if(in_array('reportcontact',$accessArr)){?> checked="checked" <?php }?>>Contact Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reportdeposit" <?php if(in_array('reportdeposit',$accessArr)){?> checked="checked" <?php }?>>Deposit Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reportrefferal" <?php if(in_array('reportrefferal',$accessArr)){?> checked="checked" <?php }?>>Refferal Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reportsubscriber" <?php if(in_array('reportsubscriber',$accessArr)){?> checked="checked" <?php }?>>Subscriber Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reportfeedback" <?php if(in_array('reportfeedback',$accessArr)){?> checked="checked" <?php }?>>Feedback Report<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="reportbug" <?php if(in_array('reportbug',$accessArr)){?> checked="checked" <?php }?>>Bug Report<br/>
         
        <br/>
       <input type="checkbox" name="access[]" value="mail" <?php if(in_array('mail',$accessArr)){?> checked="checked" <?php }?>>Mail<br/>
       <input type="checkbox" name="access[]" value="user" <?php if(in_array('user',$accessArr)){?> checked="checked" <?php }?>>Operation<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="usermg" <?php if(in_array('usermg',$accessArr)){?> checked="checked" <?php }?>>Member Management<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="wallet" <?php if(in_array('wallet',$accessArr)){?> checked="checked" <?php }?>>Wallet<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="geneology" <?php if(in_array('geneology',$accessArr)){?> checked="checked" <?php }?>>Geneology<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="document" <?php if(in_array('document',$accessArr)){?> checked="checked" <?php }?>>document<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="testimonial" <?php if(in_array('testimonial',$accessArr)){?> checked="checked" <?php }?>>Testimonial<br/>
       
       <input type="checkbox" name="access[]" value="memberaccess" <?php if(in_array('memberaccess',$accessArr)){?> checked="checked" <?php }?>>Member Access<br/>
       
       <input type="checkbox" name="access[]" value="generatebinary" <?php if(in_array('generatebinary',$accessArr)){?> checked="checked" <?php }?>>Generate Binary<br/>
       
       <input type="checkbox" name="access[]" value="summary" <?php if(in_array('summary',$accessArr)){?> checked="checked" <?php }?>>Summary<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="cashwallet" <?php if(in_array('cashwallet',$accessArr)){?> checked="checked" <?php }?>>Cash wallet<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="rpwallet" <?php if(in_array('rpwallet',$accessArr)){?> checked="checked" <?php }?>>RP Wallet<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="commissionwallet" <?php if(in_array('commissionwallet',$accessArr)){?> checked="checked" <?php }?>>Commission Wallet<br/>
       
         <input type="checkbox" name="access[]" value="news" <?php if(in_array('news',$accessArr)){?> checked="checked" <?php }?>>Summary<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="newsadd" <?php if(in_array('newsadd',$accessArr)){?> checked="checked" <?php }?>>News Add<br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="access[]" value="newslist" <?php if(in_array('newslist',$accessArr)){?> checked="checked" <?php }?>>News List<br/>
          
    </div>
</div>
 
<div class="col-md-12 form-group">
    <label class="col-md-2"></label>
    <div class="col-md-6">
        <input type="submit" class="btn green" name="submit" id="submit" size="60" maxlength="75" class="textBox" value="Submit" />
    </div>
</div> 
</form>
