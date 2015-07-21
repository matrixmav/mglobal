<?php
$this->breadcrumbs = array(    
    'Choose Template',
);
$i = 2 ;

//print_r($builderObjectTemplate); die;



if($builderObjectTemplate){ ?>
<div class="row">
<h3>Your Selected Template</h3>
    <form action = "/BuildTemp/userinput" method = "post">
    <div class = "col-md-4">
    <img src = "/user/template/<?php echo $builderObjectTemplate->folderpath;?>/screenshot/<?php echo $builderObjectTemplate->screenshot;?>" height = "200" width = "200" style = "display: block; cursor: pointer" data-toggle = "modal" data-target = "#myModalImg1"><br/>
    <div class = "form-group">

    <input type = "hidden" name = "user_id" id = "user_id" value = "<?php echo Yii::app()->session['userid'];?>">
    <input type = "hidden" name = "template_id" id = "template_id" value = "<?php echo $builderObjectTemplate->template_id;?>">
    <input type = "submit" name = "submitInput" id = "submit" class = "btn red" value = "Get Started">

    </div>
    </div>
    <!--Modal -->
    <div class = "modal fade myModalImg" id = "myModalImg1" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
    <div class = "modal-dialog">
    <div class = "modal-content">

    <div class = "modal-body">
    <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;
    </span></button>
    <img class = "img-responsive" src = "/user/template/<?php echo $builderObjectTemplate->folderpath;?>/screenshot/<?php echo $builderObjectTemplate->screenshot;?>">
    </div>
    <div class = "modal-footer">


    <input type = "submit" name = "submitInput" id = "submit" class = "btn btn-default red" value = "Get Started">


    <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>

    <a href = "/user/template/<?php echo $builderObjectTemplate->folderpath;?>" class = "btn btn-default" target = "_blank">Demo</a>
    </div>
    </div>
    </div>
    </div>
    </form>
 </div>
<?php }
echo "<div class='row'>
    <div class='col-md-8'>
<h3>More Templates</h3>";

if($builderObject){
foreach($builderObject as $buildertemp){?>
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
<?php $i++; } 
echo "</div>";
?>
<div class='col-md-4'>
  <div class= "categorySec">
<h3>More Categories</h3>

<!-- test categories -->
<div class="categoryList">
        <ul class="categoryListItems">
                    <li> <a href="javascript:void(0)" onclick='show(1);'>category1</a></li>
                  
                    <li > <a href="javascript:void(0)" onclick='show(2);'>Automobiles</a></li>
                      <li > <a href="javascript:void(0)" onclick='show(2);'>online services</a></li>
                   </ul>
</div>
<div id="categoryListBox1" style="display:none;">
    
    sandeep
</div>

<div id="categoryListBox2" style="display:none;">
    
    sandeep Kumar
</div>
<!------->

</div>
</div>
</div>
 <?php } ?>

<style>
   .myModalImg .modal-dialog{max-width:800px !important;}
   .myModalImg .close{background-image:url("/images/remove-icon.png") !important; width: 20px; height: 20px; opacity: 0.8; position: absolute; right: 1px; top: 1px;}
   .myModalImg .close:hover{opacity: 1;}
   .myModalImg .modal-content{border-radius: 8px !important;}
</style>

<script type="text/javascript">
   
    function show(categoryBoxNum) {
        $("#categoryListBox"+categoryBoxNum).show();
    }

    </script>