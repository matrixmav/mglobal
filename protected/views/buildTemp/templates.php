<?php
$this->breadcrumbs = array(
    'Templates' => array('buildtemp/templates'),
    'Choose Template',
);
 
?>
<?php foreach($builderObject as $buildertemp){?>
<a href=""><img src="/user/template/<?php echo $buildertemp->folderpath;?>/screenshot/<?php echo $buildertemp->screenshot;?>"></a><br/>
<form action="/buildtemp/userinput" method="post">
<input type="hidden" name="user_id" id="user_id" value="<?php echo Yii::app()->session['userid'];?>">
<input type="hidden" name="template_id" id="template_id" value="<?php echo $buildertemp->template_id;?>">
<input type="submit" name="submitInput" id="submit" value="Get Started">
</form>
<?php } ?>
