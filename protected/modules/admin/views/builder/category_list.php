<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Category List'
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
</style>
<div class="col-md-12">
 
<div class="row">
    <div class="col-md-12">
        <?php if(isset($_GET['msg'])&& $_GET['msg']=='1'){ ?> <p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2">
<?php echo "Category Added Succesfully."?></span></p> <?php } ?>
        <?php if(isset($_GET['msg'])&& $_GET['msg']=='2'){ ?> <p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2">
<?php echo "Category Updated Succesfully."?></span></p> <?php } ?>
        <?php if(isset($_GET['msg'])&& $_GET['msg']=='3'){ ?> <p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2">
<?php echo "Record Deleted Succesfully."?></span></p> <?php } ?>
        <?php if(isset($_GET['msg'])&& $_GET['msg']=='4'){ ?> <p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2">
            <?php echo "Status Changed Succesfully."?></span></p> <?php } ?>
        
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'state-grid',
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
                    'name' => 'name',
                    'header' => '<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->name',
                ),
                
                array(
                    'name' => 'created_at',
                    'header' => '<span style="white-space: nowrap;">Created Date&nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->created_at',
                ),
                
                 
                array(
                    'name' => 'status',
                    'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Active\') : Yii::t(\'translation\', \'Inactive\')',
                ),
              
                
                   array(
                    'class' => 'CButtonColumn',
                    'header' => '<span style="white-space: nowrap;">Action &nbsp; &nbsp; &nbsp;</span>',
                    //'template' => '{Change}{Edit}{Delete}',
                    'template' => '{Change}{Edit}',
                    'htmlOptions' => array('width' => '25%'),
                    'buttons' => array(
                         'Change' => array(
                            'label' => Yii::t('translation', 'Change Status'),
                            'options' => array('class' => 'fa fa-success btn default green delete'),
                            'url' => 'Yii::app()->createUrl("admin/BuildTemp/changestatus", array("id"=>$data->id))',
                        ),
                        'Edit' => array(
                            'label' => 'Edit',
                            'options' => array('class' => 'fa fa-success btn orange delete'),
                            'url' => 'Yii::app()->createUrl("admin/BuildTemp/categoryedit", array("id"=>$data->id))',
                        ),
//                        'Delete' => array(
//                            'label' => Yii::t('translation', 'Delete'),
//                            'options' => array('class' => 'fa fa-success btn default black delete','onclick' =>"js:alert('Do u want to delete this category?')"),
//                            'url' => 'Yii::app()->createUrl("admin/BuildTemp/deletecategory", array("id"=>$data->id))',
//                        ),
                    ),
                ),
            ),
        ));
        ?>
    </div>
</div>
