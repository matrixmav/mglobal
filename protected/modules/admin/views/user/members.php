<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
     'Member'
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

        <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/admin/UserHasAccess/members" class="form-inline">
            <div class="input-group form-group" >
                <?php
            $statusId = 0;
            if (isset($_REQUEST['res_filter'])) {
                $statusId = $_REQUEST['res_filter'];
            }
            ?>

                <select class="customeSelect howDidYou form-control input-medium" id="ui-id-5" name="res_filter" style="margin-right: 10px;">

                <option value="1" <?php if ($statusId == 1) {
                echo "selected";
            } ?> >Active</option>
                <option value="0" <?php if ($statusId == 0) {
                echo "selected";
            } ?> >In Active</option>
            </select>
                <input type="submit" class="btn btn-primary green" value="OK" name="submit" id="submit"/>
            </div>
          
        </form>
    </div>
    
</form>

</div>
<div class="row">
    <div class="col-md-12">
        <?php if(isset($_GET['successMsg']) && $_GET['successMsg']=='1'){?><p class="success-2" id="error_msg"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo "Status Changed Successfully";?></span></p><?php }?>
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
                    'header' => '<span style="white-space: nowrap;">Sl.No &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$row+1',
                ),
                array(
                    'name' => 'name',
                    'header' => '<span style="white-space: nowrap;">User Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->name)?$data->name:""',
                ),
                
                array(
                    'name' => 'full_name',
                    'header' => '<span style="white-space: nowrap;">Full Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->full_name)? $data->full_name:""',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Email &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->email)?$data->email:""',
                ),
                array(
                    'name' => 'created_at',
                    'header' => '<span style="white-space: nowrap;">Created At &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->created_at)? $data->created_at : ""',
                ),
                 
                 
                array(
                    'name' => 'status',
                    'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Active\') : Yii::t(\'translation\', \'Inactive\')',
                ),
                 array(
                    'class' => 'CButtonColumn',
                    'header' => '<span style="white-space: nowrap;">Action &nbsp; &nbsp; &nbsp;</span>',
                    'template' => '{Change} {Access}',
                    'htmlOptions' => array('width' => '25%'),
                    'buttons' => array(
                         'Change' => array(
                            'label' => Yii::t('translation', 'Change Status'),
                            'options' => array('class' => 'fa fa-success btn default green delete'),
                            'url' => 'Yii::app()->createUrl("admin/UserHasAccess/changeapprovalstatus", array("id"=>$data->id))',
                        ),
                         'Access' => array(
                            'label' => Yii::t('translation', 'Member Access'),
                            'options' => array('class' => 'fa fa-success btn orange delete'),
                            'url' => 'Yii::app()->createUrl("admin/UserHasAccess/memberaccess", array("id"=>$data->id))',
                        ),
                         
                    ),
                ),
            ),
        ));
        ?>
    </div>
</div>
