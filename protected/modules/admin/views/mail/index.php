<?php
$this->breadcrumbs = array(
    'Email' => array('/admin/mail'),
    'inbox'
);
?>

<div class="row">
    <div class="col-md-12">
            <?php echo CHtml::link(Yii::t('translation', 'Inbox'), '/admin/mail', array("class" => "btn  green margin-right-20")); ?>
            <?php echo CHtml::link(Yii::t('translation', 'Compose') . ' <i class="fa fa-plus"></i>', '/admin/mail/compose', array("class" => "btn  green margin-right-20")); ?>
            <?php echo CHtml::link(Yii::t('translation', 'Sent'), '/admin/mail/sent', array("class" => "btn  green margin-right-20")); ?>
    <div class="input-group input-large date-picker input-daterange">
        
    </div>
    <div class="expiration margin-topDefault confirmMenu">
    <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/admin/mail">
    <select class="customeSelect howDidYou form-control input-medium select2me confirmBtn" id="ui-id-5" name="admin_email">
            <option value="">Select Mail By User</option>
            <?php foreach($emailObject as $email){?>
            <option value="<?php echo $email->id;?>" <?php if(!empty($_POST) && $_POST['admin_email']== $email->id) { ?> selected="selected"<?php }?>><?php echo $email->full_name;?></option>
            <?php }?>
        </select>
        <input type="submit" class="btn btn-primary confirmOk" value="OK" name="submit" id="submit"/>
    </form>
</div>

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
    'rowCssClassExpression'=>'($data->status == 1) ? "" : "info"',  
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
            'name' => 'from_user_id',
            'header' => '<span style="white-space: nowrap;">Sender &nbsp; &nbsp; &nbsp;</span>',
            'value' => '$data->fromuser->full_name',
        ),
        array(
            'name' => 'from_user_id',
            'header' => '<span style="white-space: nowrap;">Receiver &nbsp; &nbsp; &nbsp;</span>',
            'value' => '$data->touser->full_name',
        ),
        array(
            'name' => 'subject',
            'header' => '<span style=" color:#1F92FF;white-space: nowrap;">Subject&nbsp;</span>',
            'value' => '$data->subject',
        ),
        array(
            'name' => 'updated_at',
            'header' => '<span style=" color:#1F92FF;white-space: nowrap;">Date & Time&nbsp;</span>',
            'value' => array($this, 'convertDate'),
        ),
        array(
            'name' => Yii::t('translation', 'Status'),
            'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Red\') : Yii::t(\'translation\', \'Unred\')',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{Reply}{View}',
            'htmlOptions' => array('width' => '23%'),
            'buttons' => array(
                'Reply' => array(
                    'label' => 'Reply',
                    'options' => array('class' => 'btn purple fa fa-edit margin-right15'),
                    'url' => 'Yii::app()->createUrl("admin/mail/reply", array("id"=>$data->id))',
                ),
                'View' => array(
                    'label' => 'View',
                    'options' => array('class' => 'fa fa-success btn default black delete'),
                    'url' => 'Yii::app()->createUrl("admin/mail/view", array("id"=>$data->id))',
                ),
            ),
        ),
    ),
));
?>
    </div>
</div>