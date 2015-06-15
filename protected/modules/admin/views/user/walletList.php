<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Wallet'
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
<?php 
if(!empty($_GET) && $_GET['successmsg']=='1'){
    echo "<div class='success'>Wallet amount transferred successfully.</div>";
}
?>
<?php 
if(!empty($_GET) && $_GET['successmsg']=='2'){
    echo "<div class='success'>Wallet amount deducted successfully.</div>";
}
?>

<div class="col-md-12">
    
        <div class="expiration margin-topDefault confirmMenu">
                    
    <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/admin/user/wallet">
    <div class="input-group input-large date-picker input-daterange">
        <input type="text" name="search" id="search" placeholder="Search" class="form-control" value="" />
    </div>
    <?php $walletList = BaseClass::getWalletList(); ?>
    <select class="customeSelect howDidYou form-control input-medium select2me confirmBtn" id="ui-id-5" name="walletType">
        <?php  foreach ($walletList as $key=>$value) { ?>
        <option value="<?php echo $key;?>" <?php echo ($walletType == $key)?"selected":"";?> ><?php echo $value;?></option>
        <?php } ?>
    </select>
        </div>
    <input type="submit" class="btn btn-primary confirmOk" value="OK" name="submit" id="submit"/>
    </form><br/>
<a class="btn  green margin-right-20" href="/admin/user/creditwallet">Create Wallet+</a>
</div>
<div class="row">
    <div class="col-md-12">
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
                    'name' => 'id',
                    'header'=>'No.',
                    'value'=>'$row+1',
                ),
                array(
                    'name' => 'user_id',
                    'header' => '<span style="white-space: nowrap;">Full Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->user->full_name)?$data->user->full_name:""',
                ),
                array(
                    'name' => 'user_id',
                    'header' => '<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->user->name)?$data->user->name:""',
                ),
                array(
                    'name' => 'fund',
                    //'header' => '<span style="white-space: nowrap;">Wallet Fund &nbsp; &nbsp; &nbsp;</span>',
                    'header' => '<span style="white-space: nowrap;">Fund &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->fund',
                ),
                array(
                    'name' => 'status',
                    'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Active\') : Yii::t(\'translation\', \'Inactive\')',
                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => '<span style="white-space: nowrap;">Action &nbsp; &nbsp; &nbsp;</span>',
                    'template' => '{Recharge}{Deduct}',
                    'htmlOptions' => array('width' => '25%'),
                    'buttons' => array(
                        'Recharge' => array(
                            'label' => 'Recharge',
                            'options' => array('class' => 'btn purple fa fa-edit margin-right15'),
                            'url' => 'Yii::app()->createUrl("admin/user/creditwallet", array("id"=>$data->user_id))',
                        ),
                        'Deduct' => array(
                            'label' => Yii::t('translation', 'Deduct'),
                            'options' => array('class' => 'fa fa-success btn default black delete'),
                            'url' => 'Yii::app()->createUrl("admin/user/debitwallet", array("id"=>$data->user_id))',
                        ),
                    ),
                ),
            ),
        ));
        ?>
    </div>
</div>
