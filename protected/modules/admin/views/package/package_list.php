<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Package' => array('/admin/package/list'), 'Package List'
);
?>

<style>
    .confirmBtn{left: 333px;
                position: absolute;
                top: 0;}

    .confirmOk{left: 610px;
               position: absolute;
               top: 8px;}
    .confirmMenu{position: relative;}
</style>
<div class="col-md-12">

    <div class="expiration margin-topDefault confirmMenu">

        <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/admin/package/list">
            <div class="input-group" style="margin-left:0px!important;">
                <?php
            $statusId = 1;
            if (isset($_REQUEST['res_filter'])) {
                $statusId = $_REQUEST['res_filter'];
            }
            ?>

            <select class="customeSelect howDidYou form-control input-medium select2me confirmBtn" id="ui-id-5" name="res_filter">

                <option value="1" <?php if ($statusId == 1) {
                echo "selected";
            } ?> >Active</option>
                <option value="0" <?php if ($statusId == 0) {
                echo "selected";
            } ?> >In Active</option>
            </select>
            </div>
            
    </div>
    <input type="submit" class="btn btn-primary confirmOk" value="OK" name="submit" id="submit"/>
</form>

</div>
<div class="row">
    <div class="col-md-12">
        <?php if (isset($_GET['msg']) && $_GET['msg'] == '1') { ?> <div class="success"><?php echo "Record Deleted Succesfully." ?></div> <?php } ?>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == '2') { ?> <div class="success"><?php echo "Status Changed Succesfully." ?></div> <?php } ?>

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'state-grid',
            'dataProvider' => $dataProvider,
            'enableSorting' => 'true',
            'ajaxUpdate' => true,
            'summaryText' => 'Showing {start} to {end} of {count} entries',
            'template' => '{items} {summary} {pager}',
            'itemsCssClass' => 'table table-striped table-bordered table-hover table-full-width',
            //'rowCssClassExpression'=>'fa fa-success btn default black delete',
            'pager' => array(
                'header' => false,
                'firstPageLabel' => "<<",
                'prevPageLabel' => "<",
                'nextPageLabel' => ">",
                'lastPageLabel' => ">>",
            ),
            'columns' => array(
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Sl. No &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$row+1',
                ),
                array(
                    'name' => 'name',
                    'header' => '<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->name',
                ),
                array(
                    'name' => 'amount',
                    'header' => '<span style="white-space: nowrap;">Amount &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->amount',
                ),
                array(
                    'name' => 'start_date',
                    'header' => '<span style="white-space: nowrap;">Created Date&nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->created_at',
                ),
                array(
                    'name' => 'update_at',
                    'header' => '<span style="white-space: nowrap;">Updated Time&nbsp; &nbsp; &nbsp;</span>',
                    'value' => array($this, 'getPackageUpdatedTime')
                ),
                array(
                    'name' => 'Description',
                    'header' => '<span style="white-space: nowrap;">Description &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->Description',
                ),
                array(
                    'name' => 'status',
                    'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Active\') : Yii::t(\'translation\', \'Inactive\')',
                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => '<span style="white-space: nowrap;">Action &nbsp; &nbsp; &nbsp;</span>',
                    'template' => '{Change}{Edit}{Delete}',
                    'htmlOptions' => array('width' => '30%'),
                    'buttons' => array(
                        'Change' => array(
                            'label' => Yii::t('translation', 'Change Status'),
                            'options' => array('class' => 'fa fa-success btn default black delete'),
                            'url' => 'Yii::app()->createUrl("admin/package/changestatus", array("id"=>$data->id))',
                        ),
                        'Edit' => array(
                            'label' => 'Edit',
                            'options' => array('class' => 'fa fa-success btn default black delete blue'),
                            'url' => 'Yii::app()->createUrl("admin/package/edit", array("id"=>$data->id))',
                        ),
                        'Delete' => array(
                            'label' => Yii::t('translation', 'Delete'),
                            'options' => array('class' => 'fa fa-success btn default black delete red', 'onclick' => "js:alert('Do u want to delete this package?')"),
                            'url' => 'Yii::app()->createUrl("admin/package/deletepackage", array("id"=>$data->id))',
                        ),
                    ),
                ),
            ),
        ));
        ?>
    </div>
</div>
