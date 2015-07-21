<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Bug Report'
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
                    
    <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/admin/report/contact" class="form-inline">
        <div class="input-group input-large date-picker input-daterange">
        <input type="text" name="from" placeholder="To Date" class="datepicker form-control" value="<?php echo (!empty($_POST) && $_POST['from'] !='') ?  $_POST['from'] :  DATE('Y-m-d');?>">
        <span class="input-group-addon">
        to </span>
        <input type="text" name="to" data-provide="datepicker" placeholder="From Date" class="datepicker form-control" value="<?php echo (!empty($_POST) && $_POST['to'] !='') ?  $_POST['to'] :  DATE('Y-m-d');?>">
    </div>
     
    
    </div>
    <input type="submit" class="btn btn-success confirmOk" value="OK" name="submit" id="submit" style="left:351px;"/>
    </form>

</div>
<!--+-->
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
                    'name' => 'name',
                    'header' => '<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '($data->name) ? $data->name : "N/A"',
                ),
                
                array(
                    'name' => 'email',
                    'header' => '<span style="white-space: nowrap;">Email &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->email',
                ),
                array(
                    'name' => 'phone',
                    'header' => '<span style="white-space: nowrap;">Phone  &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '($data->phone) ? $data->phone : "N/A"',
                ),
                array(
                    'name' => 'description',
                    'header' => '<span style="white-space: nowrap;">Description &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '($data->description) ? $data->description : "N/A"',
                ),
                
            ),
        ));
        ?>
    </div>
</div>
