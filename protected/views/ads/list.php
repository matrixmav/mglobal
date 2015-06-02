 
<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Ad List',
);
 
$this->menu = array(
    array('label' => 'Create Add', 'url' => array('create')),
    array('label' => 'Manage Add', 'url' => array('admin')),
);
?>
<?php //echo "<pre>"; print_r($orderObject);           ?>
<div class="main">
    <div class="container">

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-10 col-sm-9">


                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'city-grid',
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
                            'header' => '<span style="white-space: nowrap;">Sl. No &nbsp; &nbsp; &nbsp;</span>',
                            'value' => '$row+1',
                        ),
                        array(
                            'name' => 'name',
                            'header' => '<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                            'value' => 'isset($data->name)?$data->name:""',
                        ),
                        array(
                            'name' => 'description',
                            'header' => '<span style="white-space: nowrap;">Description &nbsp; &nbsp; &nbsp;</span>',
                            'value' => 'isset($data->description)?$data->description:""',
                        ),
                        array(
                            'name' => 'created_at',
                            'header' => '<span style="white-space: nowrap;">Created On &nbsp; &nbsp; &nbsp;</span>',
                            'value' => 'isset($data->created_at)?$data->created_at:""',
                        ),
                        array(
                            // 'name' => 'Share on',
                            'header' => '<span style="white-space: nowrap;">Created On &nbsp; &nbsp; &nbsp;</span>',
                            'htmlOptions' => array('width' => '25%'),
                            'value' => array($this, 'getSocialButton')
                        ),
                    ),
                ));
                ?>


            </div>
        </div>

        <script type="text/javascript" 
                src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js">
        </script> 

        <script type="text/javascript" 
                src="<?php echo Yii::app()->request->baseUrl; ?>/js/fbhelper.js">
        </script>



