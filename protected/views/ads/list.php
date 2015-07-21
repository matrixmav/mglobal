 <script type="text/javascript" src="/metronic/assets/plugins/jquery-slimscrolljquery.slimscroll.min.js"></script>
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
    <div class="">

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-10 col-sm-9">


                <?php echo count($dataProviderArray);
                foreach($dataProviderArray as $dataProvider){
                    foreach ($dataProvider as $dataProviderList){
                        echo $dataProviderList->id;
                        echo "<br/>";
                    // echo $dataProvider[0]->id;
                    //echo "<pre>"; print_r($dataProvider);
                    }   
                }
                ?>
            </div>
        </div>

        <script type="text/javascript" 
                src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js">
        </script> 

        <script type="text/javascript" 
                src="<?php echo Yii::app()->request->baseUrl; ?>/js/fbhelper.js">
        </script>



