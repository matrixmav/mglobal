<?php
$this->breadcrumbs = array(    
    'Choose Template',
);
$i = 1 ;
?>

<?php foreach($builderObject as $buildertemp){?>
    <form action="/BuildTemp/userinput" method="post">
    <div class="col-md-4">
        <img src="/user/template/<?php echo $buildertemp->folderpath;?>/screenshot/<?php echo $buildertemp->screenshot;?>" height="200" width="200" style="display: block; cursor: pointer" data-toggle="modal" data-target="#myModalImg<?php echo $i ;?>"><br/>
         <div class="form-group">
        
            <input type="hidden" name="user_id" id="user_id" value="<?php echo Yii::app()->session['userid'];?>">
            <input type="hidden" name="template_id" id="template_id" value="<?php echo $buildertemp->template_id;?>">
            <input type="submit" name="submitInput" id="submit" class="btn red" value="Get Started">
        
    </div>
    </div>
<!-- Modal -->
<div class="modal fade myModalImg"  id="myModalImg<?php echo $i ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <img class="img-responsive" src="/user/template/<?php echo $buildertemp->folderpath;?>/screenshot/<?php echo $buildertemp->screenshot;?>">
      </div>
     <div class="modal-footer">
         
        
        <input type="submit" name="submitInput" id="submit" class="btn btn-default red" value="Get Started">
        
         
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        <a href="/user/template/<?php echo $buildertemp->folderpath;?>" class="btn btn-default" target="_blank">Demo</a>
     </div>
    </div>
  </div>
</div>
 </form>
<?php $i++; } ?>

<style>
   .myModalImg .modal-dialog{max-width:800px !important;}
   .myModalImg .close{background-image:url("/images/remove-icon.png") !important; width: 20px; height: 20px; opacity: 0.8; position: absolute; right: 1px; top: 1px;}
   .myModalImg .close:hover{opacity: 1;}
   .myModalImg .modal-content{border-radius: 8px !important;}
</style>