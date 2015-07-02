<?php
$img = '"' . Yii::app()->params['baseUrl'].'/upload/banner/'.$data->ads->banner . '"'; 
$link = '"' . $data->ads->description . '"';
$name = '"' . $data->ads->name . '"';
$desc = '"' . $data->ads->description . '"';
$caption = '""';
$adId = '"' . $data->ads->id . '"';
?>

<a class='btn blue fa fa-facebook margin-right15' onclick = 'postToFeed(<?= $link; ?>, <?= $name; ?>, <?= $desc; ?>, <?= $caption; ?>,<?= $img; ?>,<?= $adId; ?>); return false;' ></a>

<a class="btn tw fa fa-twitter  margin-right15" href="https://twitter.com/intent/tweet?url=<?php echo $data->ads->description; ?>" target="_blank"></a>

<a class="btn gplus fa fa-google-plus  margin-right15" href="http://plus.google.com/share?url=<?php echo $data->ads->description; ?>&text=test" target="_blank"></a>

<!--<a class="btn insta fa fa-instagram  margin-right15" href="https://instagram.com/accounts/login/?next=%2Faccounts%2Fbadges%2F?url=<?php echo $data->ads->description; ?>" target="_blank">
</a>-->

<!--<a target ='_blank' class='btn red fa fa-twitter margin-right15' href='<?php echo Yii::app()->params['twitterLink'] . $data->ads->description; ?>'></a>-->

<?php /*<button type='button' class='btn red fa fa-code margin-right15' data-toggle='modal' data-target='<?php echo '#' . $data->id; ?>'>Get Code</button>
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
</div>*/
?>