<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
     'Reports' => array('/admin/report/verification'),'Verification'
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
                    
    <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/admin/report/verification">
    <div class="input-group input-large date-picker input-daterange">
        <input type="text" name="from" placeholder="To Date" class="datepicker form-control">
        <span class="input-group-addon">
        to </span>
        <input type="text" name="to" data-provide="datepicker" placeholder="From Date" class="datepicker form-control">
    </div>
    <?php 
    $statusId =   1;
    if(isset($_REQUEST['res_filter'])){
      $statusId =   $_REQUEST['res_filter'];
    } ?>
    
    <select class="customeSelect howDidYou form-control input-medium select2me confirmBtn" id="ui-id-5" name="res_filter">
                <option value="1" <?php if($statusId == 1){ echo "selected"; } ?> >Active</option>
                <option value="0" <?php if($statusId == 3){ echo "selected"; } ?> >In Active</option>
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
                    'name' => 'full_name',
                    'header' => '<span style="white-space: nowrap;">Full Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->user->full_name)?$data->user->full_name:""',
                ),
                
                array(
                    'name' => 'email',
                    'header' => '<span style="white-space: nowrap;">Address Proof &nbsp; &nbsp; &nbsp;</span>',
                    'value' => array($this,'gridAddressImagePopup'),
                ),
                array(
                    'name' => 'sponsor_id',
                    'header' => '<span style="white-space: nowrap;">Id Proof &nbsp; &nbsp; &nbsp;</span>',
                    'value' => array($this,'gridIdImagePopup'),
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">City &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->city_name',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">State &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->state_name',
                ),
                array(
                    'name' => 'country_id',
                    'header' => '<span style="white-space: nowrap;">Country &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->country->name)?$data->country->name:""',
                ),
                array(
                    'name' => 'phone',
                    'header' => '<span style="white-space: nowrap;">Phone &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->user->phone',
                ),
                array(
                    'name' => 'status',
                    'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Verified\') : Yii::t(\'translation\', \'Pending\')',
                ),
            ),
        ));
        ?>
    </div>
</div>
