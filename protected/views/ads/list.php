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
<div class="main">
    <div class="row margin-bottom-40">        
    <?php   
    if($dataProviderArray){
        foreach($dataProviderArray as $key=>$dataProviderList){ 
            $i = 1; ?>
        <div class="col-md-6 col-sm-6">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="grid-view" id="city-grid">
                        <div id="testDiv<?php echo $key; ?>">
                            <table class="table table-striped table-bordered table-hover table-full-width">
                                <thead>
                                    <tr>
                                        <th id="city-grid_c0">
                                            <a href="#" class="sort-link">
                                                <span style="white-space: nowrap;">Sl. No &nbsp; &nbsp; &nbsp;</span>
                                            </a>
                                        </th>
                                        <th id="city-grid_c1">
                                            <a href="#" class="sort-link">
                                                <span style="white-space: nowrap;">Date &nbsp; &nbsp; &nbsp;</span>
                                            </a>
                                        </th>
                                        <th id="city-grid_c2">
                                            <a href="#" class="sort-link">
                                                <span style="white-space: nowrap;">Ad Date &nbsp; &nbsp; &nbsp;</span>
                                            </a>
                                        </th>
                                        <th id="city-grid_c3">
                                            <a href="#" class="sort-link">
                                                <span style="white-space: nowrap;">Earn &nbsp; &nbsp; &nbsp;</span>
                                            </a>
                                        </th>
                                        <th id="city-grid_c4">
                                            <a href="#" class="sort-link">
                                                <span style="white-space: nowrap;">Share &nbsp; &nbsp; &nbsp;</span>
                                            </a>
                                        </th>                        
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($dataProviderList  as $dataProvider){ ?>
                                    <tr <?php if($dataProvider->date != date('Y-m-d')){ echo "class='rowFade'" ; } ?> >
                                       <td><?php echo $i; ?></td>
                                       <td><?php echo $dataProvider->date ; ?></td>
                                       <td><?php echo $dataProvider->created_at ; ?></td>
                                       <td><?php echo $dataProvider->status == 1 ?"Earn":"Not Earn" ?></td>
                                       <?php
                                            $adObject = Ads::model()->findByPk($dataProvider->ad_id);
                                            $img =  '"' . Yii::app()->params['baseUrl'].'/upload/banner/'.$adObject->banner . '"'; 
                                            $link = '"' . $adObject->description . '"';
                                            $name = '"' . $adObject->name . '"';
                                            $desc = '"' . $adObject->description . '"';
                                            $caption = '""';
                                            $adId = '"' . $adObject->id . '"';
                                        ?>
                                       
                                       <td><a class='btn blue fa fa-facebook margin-right15' onclick = 'postToFeed(<?= $link; ?>, <?= $name; ?>, <?= $desc; ?>, <?= $caption; ?>,<?= $img; ?>,<?= $adId; ?>); return false;' ></a></td>                                     
                                   </tr>   
                                    <?php $i++ ; } ?>

                                </tbody>                                    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php   } 
    }
?>
    </div>
</div>    
<?php // 'value' => array($this, 'getSocialButton') ?>            
 <script type="text/javascript" src="/metronic/assets/plugins/jquery-slimscrolljquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js"></script> 
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fbhelper.js"></script>
 <script type="text/javascript">
    $( document ).ready(function() { 
        $('#testDiv1').slimScroll({
            color: '#f15c2b',
            position:'right',
            height: '400px'
        });
        $('#testDiv2').slimScroll({
              color: '#f15c2b',
              position:'right',
              height: '400px'
        });
        $('#testDiv3').slimScroll({
            color: '#f15c2b',
            position:'right',
            height: '400px'
        });
        $('#testDiv0').slimScroll({
            color: '#f15c2b',
            position:'right',
            height: '400px'
        });
    });  
</script>
<style>
    .slimScrollBar{opacity:1 !important; border-radius: 7px !important;}    
</style>