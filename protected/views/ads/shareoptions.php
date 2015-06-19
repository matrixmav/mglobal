<?php
$img = '"' . Yii::app()->params['baseUrl'].'/upload/banner/'.$data->banner . '"'; 
$link = '"' . $data->description . '"';
$name = '"' . $data->name . '"';
$desc = '"' . $data->description . '"';
$caption = '""';
$adId = '"' . $data->id . '"';

?>

<a class='btn blue fa fa-facebook margin-right15' onclick = 'postToFeed(<?= $link; ?>, <?= $name; ?>, <?= $desc; ?>, <?= $caption; ?>,<?= $img; ?>,<?= $adId; ?>);
        return false;'  >
</a>

<!--<a target ='_blank' class='btn red fa fa-twitter margin-right15' href='<?php echo Yii::app()->params['twitterLink'] . $data->description; ?>'></a>-->

<button type='button' class='btn red fa fa-code margin-right15' data-toggle='modal' data-target='<?php echo '#' . $data->id; ?>'>Get Code</button>
<div class="modal fade" id="<?php echo $data->id; ?>" role="dialog">
    <div class="modal-dialog" style="width:700px;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Copy Code...</h4>
            </div>
            <div class="modal-body">
                <textarea cols='70' rows="4"><a href=<?php echo $link; ?>> <?php echo $data->get_code; ?> </a>
                </textarea>
            </div><div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>