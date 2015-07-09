<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Member Address Report'
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
                    
    <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/admin/report/address">
    <div class="input-group input-large date-picker input-daterange">
        <input type="text" name="from" placeholder="To Date" class="datepicker form-control" value="<?php echo (!empty($_POST) && $_POST['from'] !='') ?  $_POST['from'] :  DATE('Y-m-d');?>">
        <span class="input-group-addon">
        to </span>
        <input type="text" name="to" data-provide="datepicker" placeholder="From Date" class="datepicker form-control" value="<?php echo (!empty($_POST) && $_POST['to'] !='') ?  $_POST['to'] :  DATE('Y-m-d');?>">
    </div>
    <?php 
    $statusId =   1;
    if(isset($_REQUEST['res_filter'])){
      $statusId =   $_REQUEST['res_filter'];
    } ?>
    
    <select class="customeSelect howDidYou form-control input-medium select2me confirmBtn" id="ui-id-5" name="res_filter" style="display:none;">
                <option value="1" <?php if($statusId == 1){ echo "selected"; } ?> >Active</option>
                <option value="0" <?php if($statusId == 0){ echo "selected"; } ?> >In Active</option>
            </select>
    </div>
    <input type="submit" class="btn btn-primary confirmOk" value="OK" name="submit" id="submit"/>
    </form>

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
                    'value' => 'isset($data->user->name)?$data->user->name:""',
                ),
                
                array(
                    'name' => 'address',
                    'header' => '<span style="white-space: nowrap;">Address 1 &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->street',
                ),
                array(
                    'name' => 'street',
                    'header' => '<span style="white-space: nowrap;">Address 2 &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->address',
                ),
                array(
                    'name' => 'city_name',
                    'header' => '<span style="white-space: nowrap;">City &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->city_name',
                ),
                array(
                    'name' => 'state_name',
                    'header' => '<span style="white-space: nowrap;">State &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->state_name',
                ),
                array(
                    'name' => 'country_id',
                    'header' => '<span style="white-space: nowrap;">Country &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->country->name)?$data->country->name:""',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Phone &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->user->phone)?$data->user->phone:""',
                ),
                array(
                    'name' => 'status',
                    'value' => '($data->user->status == 1) ? Yii::t(\'translation\', \'Active\') : Yii::t(\'translation\', \'Inactive\')',
                ),
            ),
        ));
        ?>
    </div>
</div>
