<?php
$this->breadcrumbs = array(
    'User' => array('/admin/user/index'),
    'Member Access'
);
?>
<form class="form-horizontal" role="form" id="form_admin_reservation" enctype="multipart/form-data" action="/admin/userhasaccess/memberaccess" method="post" onsubmit="return validateForm()">

<div class="col-md-12 form-group">
    <div class="col-md-6">
        <input type="checkbox" name="access[]" id="builder">Builder
        <input type="checkbox" name="access[]" id="ads">Ads
        <input type="checkbox" name="access[]" id="package">package
        <input type="checkbox" name="access[]" id="reports">Reports
        <input type="checkbox" name="access[]" id="users">Member Management
        <input type="checkbox" name="access[]" id="mail">Mail
    </div>
</div>
 
<div class="col-md-12 form-group">
    <label class="col-md-2"></label>
    <div class="col-md-6">
        <input type="submit" class="btn green" name="submit" id="submit" size="60" maxlength="75" class="textBox" value="Submit" />
    </div>
</div> 
</form>
