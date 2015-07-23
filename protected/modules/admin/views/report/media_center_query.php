<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Media Center Report'
);
?>

<style>
    .confirmBtn{left: 333px;
    position: absolute;
    top: 0;}
    
    .confirmOk{
        margin-top: 7px;
margin-left: 5px;
float:left;
    }
    .confirmMenu{position: relative;float:left;}
    

</style>
<div class="col-md-12">
    
        <div class="expiration margin-topDefault confirmMenu">
                    
    <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="/admin/report/mediacenter">
    <div class="input-group input-large date-picker input-daterange">
        <input type="text" name="from" placeholder="To Date" class="datepicker form-control" value="<?php echo (!empty($_POST) && $_POST['from'] !='') ?  $_POST['from'] :  DATE('Y-m-d');?>">
        <span class="input-group-addon">
        to </span>
        <input type="text" name="to" data-provide="datepicker" placeholder="From Date" class="datepicker form-control" value="<?php echo (!empty($_POST) && $_POST['to'] !='') ?  $_POST['to'] :  DATE('Y-m-d');?>">
    </div>
    
    </div>
    <input type="submit" class="btn btn-success confirmOk" value="OK" name="submit" id="submit"/>
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
                    'header' => '<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->name)? $data->name:""',
                ),
                
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Email &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->email',
                ),
                array(
                    'name' => 'type',
                    'header' => '<span style="white-space: nowrap;">Query Type &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->type',
                ),
                 
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">Created At &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->add_date)? $data->add_date:""',
                ),
               
            ),
        ));
        ?>
    </div>
</div>
