<?php
$this->breadcrumbs = array(
    'Ads' => array('/admin/Ads')    
); 
?>

<div class="row">
    <div class="col-md-12">
     <?php if(isset($_GET['successMsg']) && $_GET['successMsg']=='1'){?><div class="success" id="error_msg"><?php echo "Banner Update Successfully";?></div><?php }?>    
    </div>
</div>
<div class="row">
    <div class="col-md-12">
<?php        

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'room-grid',
    'dataProvider' => $dataProvider,
    'enableSorting' => 'true',
    'ajaxUpdate' => true,
    'summaryText' => 'Showing {start} to {end} of {count} entries',
    'template' => '{items} {summary} {pager}',
    'itemsCssClass' => 'table table-striped table-bordered table-hover table-full-width',
    'pager' => array(
        'header' => false,
        'firstPageLabel' => "<<",
        'prevPageLabel' => "<",
        'nextPageLabel' => ">",
        'lastPageLabel' => ">>",
    ),
    'columns' => array(
        //'idJob',
        array(
            'name' => 'id',
            'header'=>'No.',
            'value'=>'$row+1',
        ),
        array(
            'name' => 'name',
            'header' => '<span style="white-space: nowrap;">Name</span>',
            'value' => '$data->name',
        ),
        array(
            'name' => 'banner',
            'header' => '<span style="white-space: nowrap;">Banner</span>',
            'value' => array($this ,'gridBannerImage'),
        ),
        array(
            'name' => 'description',
            'header' => '<span style="white-space: nowrap;">Description</span>',
            'value' => '$data->description',
        ),
        array(
            'name' => 'status',
            'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Active\') : Yii::t(\'translation\', \'Pending\')',
        ),
        array(
            'name' => 'created_at',
            'header' => '<span style=" color:#1F92FF;white-space: nowrap;">Created Date</span>',
            'value' => '$data->created_at',
        ),
        array(
            'name' => 'updated_at',
            'header' => '<span style=" color:#1F92FF;white-space: nowrap;">Update Date</span>',
            'value' => '$data->updated_at',
        ), 
        
        array(
            'class' => 'CButtonColumn',
            'header' => '<span style="white-space: nowrap;">Action &nbsp; &nbsp; &nbsp;</span>',
            'template' => '{Change} {Edit}',
            'htmlOptions' => array('width' => '25%'),
            'buttons' => array(
                'Change' => array(
                    'label' => Yii::t('translation', 'Change Status'),
                    'options' => array('class' => 'fa fa-success btn default black delete'),
                    'url' => 'Yii::app()->createUrl("admin/ads/changestatus", array("id"=>$data->id))',
                ),
                'Edit' => array(
                    'label' => Yii::t('translation', 'Edit'),
                    'options' => array('class' => 'fa fa-success btn default black delete'),
                    'url' => 'Yii::app()->createUrl("admin/ads/edit", array("id"=>$data->id))',
                ),

                
            ),
        ),
        
    ),
));
?>
    </div>
</div>