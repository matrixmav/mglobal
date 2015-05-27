<?php foreach($builderObject as $buildertemp){?>
<a href=""><img src="/user/template/<?php echo $buildertemp->folderpath;?>/screenshot/<?php echo $buildertemp->screenshot;?>"></a><br/>
<form action="/buildtemp/managewebsite" method="post">
<input type="hidden" name="user_id" id="user_id" value="<?php echo Yii::app()->session['userid'];?>">
<input type="hidden" name="template_id" id="template_id" value="<?php echo $buildertemp->template_id;?>">
<input type="hidden" name="header_id" id="header_id" value="<?php echo $buildertemp->temp_header_id;?>">
<input type="hidden" name="body_id" id="body_id" value="<?php echo $buildertemp->temp_body_id;?>">
<input type="hidden" name="footer_id" id="footer_id" value="<?php echo $buildertemp->temp_footer_id;?>">
<input type="submit" name="submit" id="submit" value="Get Started">
</form>
<?php } ?>
