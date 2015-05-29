<?php
$this->breadcrumbs = array(
    'Templates' => array('buildtemp/templates'),
    'Choose Template',
);
 
?>

<?php foreach($builderObject as $buildertemp){?>
    <div class="col-md-4">
        <img src="/user/template/<?php echo $buildertemp->folderpath;?>/screenshot/<?php echo $buildertemp->screenshot;?>" height="200" width="200" ><br/>
        <form action="/buildtemp/userinput" method="post">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo Yii::app()->session['userid'];?>">
            <input type="hidden" name="template_id" id="template_id" value="<?php echo $buildertemp->template_id;?>">
            <input type="submit" name="submitInput" id="submit" class="btn" value="Get Started">
        </form>
    </div>
<?php } ?>