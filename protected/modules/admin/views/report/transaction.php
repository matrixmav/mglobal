<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Transaction Report'
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
                    
    <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/admin/report/transaction">
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
    
    <select class="customeSelect howDidYou form-control input-medium select2me confirmBtn" id="ui-id-5" name="res_filter">
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
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Transaction Id &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->transaction->transaction_id)?$data->transaction->transaction_id:""',
                ),
                 array(
                    'name' => 'created_at',
                    'header' => '<span style="white-space: nowrap;">Date &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->created_at',
                ),
                 array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">To User &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->touser->name)?$data->touser->name:""',
                ),
                 array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">From User &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->fromuser->name)?$data->fromuser->name:""',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Actual Amt &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->transaction->actual_amount)?$data->transaction->actual_amount:""',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Paid Amt &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->transaction->paid_amount)?$data->transaction->paid_amount:""',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Used RP &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->transaction->used_rp)? $data->transaction->used_rp:"N/A"',
                ),
                 array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Discount &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->transaction->coupon_discount)?$data->transaction->coupon_discount:""',
                ),
                
            ),
        ));
        ?>
    </div>
</div>
