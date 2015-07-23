<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Package List'
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
    .orange{margin-left: 5px;}
    .red{margin-left: 5px;}
</style>
<div class="col-md-12">

    <div class="expiration margin-topDefault confirmMenu">

        <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/admin/package/list" class="form-inline">
            <div class="input-group form-group" >
                <?php
            $statusId = 1;
            if (isset($_REQUEST['res_filter'])) {
                $statusId = $_REQUEST['res_filter'];
            }
            ?>

                <select class="customeSelect howDidYou form-control input-medium" id="ui-id-5" name="res_filter" style="margin-right: 10px;">

                <option value="1" <?php if ($statusId == 1) {
                echo "selected";
            } ?> >Active</option>
                <option value="0" <?php if ($statusId == 0) {
                echo "selected";
            } ?> >In Active</option>
            </select>
                <input type="submit" class="btn btn-success " value="OK" name="submit" id="submit"/>
            </div>
          
        </form>
    </div>
    
</form>

</div>
<div class="row">
    <div class="col-md-12">
        <?php if (!empty($_GET['msg']) && $_GET['msg'] == '1') { ?> <p class="success-2" ><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo "Record Deleted Succesfully." ?></span></p> <?php } ?>
        <?php if (!empty($_GET['msg']) && $_GET['msg'] == '2') { ?> <p class="success-2" ><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo "Status Changed Succesfully." ?></span></p> <?php } ?>
        <?php if (!empty($_GET['success'])) { ?> <p class="success-2" ><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo $_GET['success'];?></span></p> <?php } ?>
         <?php if (!empty($_GET['error'])) { ?> <p class="success-2" ><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php $_GET['error'];?></span></p> <?php } ?>

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
                    'template' => '{Change}{Edit}',
                    'htmlOptions' => array('width' => '25%'),
                    'buttons' => array(
                        'Change' => array(
                            'label' => Yii::t('translation', 'Change Status'),
                            'options' => array('class' => 'fa fa-success btn default green delete'),
                            'url' => 'Yii::app()->createUrl("admin/package/changestatus", array("id"=>$data->id))',
                        ),
                        'Edit' => array(
                            'label' => 'Edit',
                            'options' => array('class' => 'fa fa-success btn orange'),
                            'url' => 'Yii::app()->createUrl("admin/package/edit", array("id"=>$data->id))',
                        ),
                        /*'Delete' => array(
                            'label' => Yii::t('translation', 'Delete'),
                            'options' => array('class' => 'fa fa-success btn default black delete red', 'onclick' => "js:alert('Do u want to delete this package?')"),
                            'url' => 'Yii::app()->createUrl("admin/package/deletepackage", array("id"=>$data->id))',
                        ),*/
                    ),
                ),
            ),
        ));
        ?>
    </div>
</div>
