<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Ad List',
);
 
?>
<div class="main">
    <div class="row margin-bottom-40">        
    <?php   
    if($dataProviderArray){
        foreach($dataProviderArray as $key=>$dataProviderList){ 
            $i = 1; ?>
        <div class="col-md-12 col-sm-12">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="grid-view" id="city-grid">
                       
                            <table class="table table-striped table-bordered table-hover table-full-width"  style="table-layout:fixed;  padding: 0;margin: 0;margin-top: 20px !important;">
                                <thead>
                                    <tr>
                                        <th width="25%" id="city-grid_c0">
                                            <a href="#" class="sort-link">
                                                <span style="white-space: nowrap;">Sl. No &nbsp; &nbsp; &nbsp;</span>
                                            </a>
                                        </th>
                                        <th width="25%" id="city-grid_c1">
                                            <a href="#" class="sort-link">
                                                <span style="white-space: nowrap;">Date &nbsp; &nbsp; &nbsp;</span>
                                            </a>
                                        </th>
                                        <th width="25%" id="city-grid_c2">
                                            <a href="#" class="sort-link">
                                                <span style="white-space: nowrap;">Ad Date &nbsp; &nbsp; &nbsp;</span>
                                            </a>
                                        </th>
                                        <th width="25%" id="city-grid_c3">
                                            <a href="#" class="sort-link">
                                                <span style="white-space: nowrap;">Earn &nbsp; &nbsp; &nbsp;</span>
                                            </a>
                                        </th>
                                        <th width="25%" id="city-grid_c4">
                                            <a href="#" class="sort-link">
                                                <span style="white-space: nowrap;">Share &nbsp; &nbsp; &nbsp;</span>
                                            </a>
                                        </th>                        
                                    </tr>
                                </thead>
                            </table>
                         <div id="testDiv<?php echo $key; ?>">
                            <table class="table table-striped table-bordered table-hover table-full-width" style="margin-bottom: -3px !important;">
                                <tbody>
                                    <?php foreach ($dataProviderList  as $dataProvider){ ?>
                                    <tr <?php if($dataProvider->date != date('Y-m-d')){ echo "class='rowFade'" ; } ?> >
                                       <td width="20%"><?php echo $i; ?></td>
                                       <td width="20%"><?php echo $dataProvider->date ; ?></td>
                                       <td width="20%"><?php echo $dataProvider->created_at ; ?></td>
                                       <td width="20%"><?php echo $dataProvider->status == 1 ?"Earn":"Not Earn" ?></td>
                                       <?php
                                            $adObject = Ads::model()->findByPk($dataProvider->ad_id);
                                            $img =  '"' . Yii::app()->params['baseUrl'].'/upload/banner/'.$adObject->banner . '"'; 
                                            $link = '"' . $adObject->description . '"';
                                            $desc = '"' . $adObject->description . '"';
                                            $name = '"' . $adObject->name . '"';
                                            $caption = '""';
                                            $adId = '"' . $adObject->id . '"';
                                        ?>
                                       
                                       <td width="20%"><a class='btn blue fa fa-facebook margin-right15' onclick = 'postToFeed(<?= $link; ?>, <?= $name; ?>, <?= $desc; ?>, <?= $caption; ?>,<?= $img; ?>,<?= $adId; ?> ,<?= $dataProvider->order_id; ?>); return false;' ></a></td>                                     
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
        $('#testDiv4').slimScroll({
            color: '#f15c2b',
            position:'right',
            height: '400px'
        });
        $('#testDiv5').slimScroll({
            color: '#f15c2b',
            position:'right',
            height: '400px'
        });
        $('#testDiv6').slimScroll({
            color: '#f15c2b',
            position:'right',
            height: '400px'
        });
        $('#testDiv7').slimScroll({
            color: '#f15c2b',
            position:'right',
            height: '400px'
        });
        $('#testDiv8').slimScroll({
            color: '#f15c2b',
            position:'right',
            height: '400px'
        });
        
    });  
</script>
<style>
    .slimScrollBar{opacity:1 !important; border-radius: 7px !important;}
    </style>
