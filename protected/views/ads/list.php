 
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
                    'rowCssClassExpression' => '($data->date == date("Y-m-d")) ? "odd" : "rowFade"',
                    'pager' => array(
                        'header' => false,
                        'firstPageLabel' => "<<",
                        'prevPageLabel' => "<",
                        'nextPageLabel' => ">",
                        'lastPageLabel' => ">>",
                    ),
                    
                   'columns'=>array(
                        //'idJob',

                        array(
                            'name' => 'id',
                            'header' => '<span style="white-space: nowrap;">Sl. No &nbsp; &nbsp; &nbsp;</span>',
                            'value' => '$row+1',
                        ),
                        array(
                            'name' => 'date',
                            'header' => '<span style="white-space: nowrap;">Date &nbsp; &nbsp; &nbsp;</span>',
                            'value' => 'isset($data->date)?$data->date:""',
                        ),
                        array(
                            'name' => 'ad_id',
                            'header' => '<span style="white-space: nowrap;">Ad Name &nbsp; &nbsp; &nbsp;</span>',
                            'value' => 'isset($data->ads->name)?$data->ads->name:""',
                        ),
                        array(
                            'name' => 'Earn',
                            'header' => '<span style="white-space: nowrap;">Earn &nbsp; &nbsp; &nbsp;</span>',
                            'value' => '$data->status == 1 ?"Earn":"Not Earn"',
                        ),
                        array(
                            'name' => 'created_at',
                            'header' => '<span style="white-space: nowrap;">Share &nbsp; &nbsp; &nbsp;</span>',
                            'htmlOptions' => array('width' => '25%'),
                            'value' => array($this, 'getSocialButton')
                        ),
                        //                       
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



