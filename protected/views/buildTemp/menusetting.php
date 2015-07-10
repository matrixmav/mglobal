<?php
$this->breadcrumbs = array(
    'Menu Drag & drop hierarchical list with mouse and touch compatibility',
);
?>
<div class="col-md-12 col-sm-12" id="test">
    <?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
    <?php if ($success) { ?><div class="success" id="error_msg"><?php echo $success; ?></div><?php } ?>
    
    <?php 
    if (count($userpagesObject) > 0) {
        foreach ($userpagesObject as $page) {
            ?>
            <a href="/BuildTemp/pagedit?id=<?php echo $page->id; ?>" class="btn green"><?php echo $page->page_name; ?></a>
        <?php }
    }
    ?> 
<?php echo BaseClass::buildWebsiteHeader(); ?> 
</div>
<div class="col-md-12 col-sm-12" id="test">
    
</div>
<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/drag_drop.css">    
    <form method="post" action="">

    <div class="cf nestable-lists">
        <div class="dd" id="nestable">
            <ol class="dd-list">
                
                <?php 
                    foreach ($userpagesObject as $data){
                        echo  '<li class="dd-item" data-id="'.$data->id.'">
                                <div class="dd-handle">'.$data->page_name.'</div>';
                        
                                $userpagesObjectAll = UserPages::model()->findAll('parent ='. $data->id);
                                if(count($userpagesObjectAll) > 0){
                                    echo '<ol class="dd-list">';
                                        foreach ($userpagesObjectAll as $dataSecond){
                                            echo '<li class="dd-item dd3-item" data-id='.$dataSecond->id.'>';
                                            echo '<div class="dd-handle">'.$dataSecond->page_name.'</div>';
                                            echo '</li>';
                                        }    
                                    echo '</ol>';
                                }else{

                                }
                         echo  '</li>';
                    }
                ?>

            </ol>
        </div>
    
        <!--<textarea id="nestable-output" name="nestable1" class="form_control" hidden=""></textarea>-->
        <input type="hidden" id="nestable-output" name="nestable1" class="form_control" value="">
    </div>
    
        <input type="submit" name="submit" value="submit" class="btn red">
</form>
    
<script src="<?php echo Yii::app()->getBaseUrl(true); ?>/js/jquery.nestable.js"></script>
<script>

$(document).ready(function(){

    var updateOutput = function(e){
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);
    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

});
</script>