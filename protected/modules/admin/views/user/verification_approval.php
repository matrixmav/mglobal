<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
     'Document Approval'
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
                    
    <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/admin/user/verificationapproval">
        <div class="input-group input-large date-picker input-daterange" style="z-index:9;">
        <input type="text" name="from" placeholder="To Date" class="datepicker form-control" value="<?php echo (!empty($_POST) && $_POST['from'] !='') ?  $_POST['from'] :  DATE('Y-m-d');?>">
        <span class="input-group-addon">
        to </span>
        <input type="text" name="to" data-provide="datepicker" placeholder="From Date" class="datepicker form-control" value="<?php echo (!empty($_POST) && $_POST['to'] !='') ?  $_POST['to'] :  DATE('Y-m-d');?>">
    </div>
    <?php 
    
    if(isset($_POST['res_filter']) && $_POST['res_filter'] !=''){
      $statusId =   $_POST['res_filter'];
    }else{
      $statusId =   "0";   
    } ?>
    
    <select class="customeSelect howDidYou form-control input-medium select2me confirmBtn" id="ui-id-5" name="res_filter">
                 <option value="all" <?php if($statusId==''){?> selected="selected"<?php }?>>All</option> 
                <option value="1" <?php if($statusId=='1'){?> selected="selected"<?php }?>>Approved</option>
                <option value="0" <?php if($statusId=='0'){?> selected="selected"<?php }?>>Pending</option>
            </select>
    </div>
    <input type="submit" class="btn btn-success confirmOk" value="OK" name="submit" id="submit"/>
    </form>

</div>
<div class="row">
    <div class="col-md-12">
        <?php if(isset($_GET['successMsg']) && $_GET['successMsg']=='1'){?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo "Status Changed Successfully";?><span></p><?php }?>
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
                   'name' => 'user_id',
                    'header' => '<span style="white-space: nowrap;">Sl.No &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$row+1',
                ),
                array(
                    'name' => 'user_id',
                    'header' => '<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->user->name)?$data->user->name:""',
                ),
                
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Address Proof &nbsp; &nbsp; &nbsp;</span>',
                    'value' => array($this,'gridAddressImagePopup'),
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Id Proof &nbsp; &nbsp; &nbsp;</span>',
                    'value' => array($this,'gridIdImagePopup'),
                ),
                array(
                    'name' => 'created_at',
                    'header' => '<span style="white-space: nowrap;">Created At &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->created_at',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">State &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->state_name',
                ),
                /*array(
                    'name' => 'country_id',
                    'header' => '<span style="white-space: nowrap;">Country &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->country->name)?$data->country->name:""',
                ),*/
                array(
                    'name' => 'user_id',
                    'header' => '<span style="white-space: nowrap;">Phone &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->user->phone',
                ),
                array(
                    'name' => 'status',
                    'value' => '($data->document_status == 1) ? Yii::t(\'translation\', \'Approved\') : Yii::t(\'translation\', \'Pending\')',
                ),
                 array(
                    'class' => 'CButtonColumn',
                    'header' => '<span style="white-space: nowrap;">Action &nbsp; &nbsp; &nbsp;</span>',
                    'template' => '{Change}',
                    'buttons' => array(
                         'Change' => array(
                            'label' => Yii::t('translation', 'Change Status'),
                            'options' => array('class' => 'fa fa-success btn default green delete'),
                            'url' => 'Yii::app()->createUrl("admin/user/changeapprovalstatus", array("id"=>$data->id))',
                        ),
                         
                    ),
                ),
            ),
        ));
        ?>
    </div>
</div>
