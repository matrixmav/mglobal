<?php
$this->breadcrumbs = array(
    'Email' => array('/admin/mail'),
    'Compose'
);
?>
<?php
if (!empty($error)) {
    echo "<p class='error'>" . $error . "</p>";
}
?>
<script type="text/javascript" src="/js/transaction.js"></script>

<?php 
$_GET['successMsg'] = 0;
if(!empty($_GET) && $_GET['successMsg']=='1'){
    echo "<div class='success'>Your message sent successfully.</div>";
}
?>
<div class="row">
    <div class="col-md-12">
        <?php echo CHtml::link(Yii::t('translation', 'Inbox'), '/admin/mail', array("class" => "btn  green margin-right-20")); ?>
        <?php echo CHtml::link(Yii::t('translation', 'Compose') . ' <i class="fa fa-plus"></i>', '/admin/mail/compose', array("class" => "btn  green margin-right-20")); ?>
        <?php echo CHtml::link(Yii::t('translation', 'Sent'), '/admin/mail/sent', array("class" => "btn  green margin-right-20")); ?>
    </div>
</div><br/>
<form class="form-horizontal" role="form" id="form_admin_reservation" enctype="multipart/form-data" action="/admin/mail/compose" method="post" onsubmit="return validateForm()">
    <div class="col-md-12 form-group">
        <label class="col-md-2">To *</label>
        <div class="col-md-6">
            <input type="text" class="form-control dvalid" name="to_email[]"  onchange="getFullName(this.value);" id="search_username" size="60" maxlength="75" value="<?php echo (isset($mailObject)) ? $mailObject->fromuser->full_name : ""; ?>" />
            <span id="search_user_error" style="color:red"></span>
        </div>
    </div>
    <div class="col-md-12 form-group">
        <label class="col-md-2">Subject *</label>
        <div class="col-md-6">
            <input type="text" class="form-control dvalid" name="email_subject" id="email_subject" size="60" maxlength="75" class="textBox" value="<?php echo (isset($mailObject)) ? $mailObject->subject : ""; ?>" />
            <span class="clrred" style="color:red" id="email_subject_error"></span>
        </div>
    </div>
    <div class="col-md-12 form-group">
        <label class="col-md-2">Message *</label>
        <div class="col-md-8"><textarea class="form-control dvalid" name="email_body" id="email_body" rows="10" cols="50">
                <?php
                if (!empty($mailObject)) {
                    echo str_replace("<br />", '', nl2br("<=== \n"));
                    $replyMsg = nl2br($mailObject->touser->email . " : " . $mailObject->updated_at . "\n" . $mailObject->message);
                    echo str_replace("<br />", '', $replyMsg);
                }
                ?></textarea>
            <span class="clrred" style="color:red"  id="email_body_error"></span>
        </div>
    </div>
    <div class="col-md-12 form-group">
    <label class="col-md-2">Attachement </label>
    <div class="col-md-6">
        <input type="hidden" name="attachment1" id="" value="<?php echo (!empty($mailObject)) ? $mailObject->attachment : "";?>"/>
        <input type="file" name="attachment" id="attachement"/>
        <?php if(!empty($mailObject) && $mailObject->attachment !=''){ ?>
        <?php echo $mailObject->attachment;?>
        <?php }?>
        <span class="clrred" style="color:red"  id="email_address_error"></span>
    </div>
</div>
    <div class="col-md-12 form-group">
        <label class="col-md-2"></label>
        <div class="col-md-6">
            <input type="submit" class="btn green" name="submit" id="submit" size="60" maxlength="75" class="textBox" value="Submit" />
        </div>
    </div> 
</form>

<script language = "Javascript">
    function validateForm() {
        if ($("#to_email").val() == "") {
            $("#to_email_error").html("Enter the to E-Mail ");
            return false;
        }
        if ($("#email_subject").val() == "") {
            $("#email_subject_error").html("Enter the Subject");
            return false;
        }
        if ($("#email_body").val() == "") {
            $("#email_body").html("Enter the Mail Boday!!!");
            return false;
        }
    }
</script>
