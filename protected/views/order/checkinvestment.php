<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Check Investment',
);


$this->menu = array(
    array('label' => 'Create Order', 'url' => array('create')),
    array('label' => 'Manage Order', 'url' => array('admin')),
);
?>

<style>
    .confirmBtn{left: 333px;
                position: absolute;
                top: 0;}

    .confirmOk{left: 355px;
               position: absolute;
               top: 6px;}
    .confirmMenu{position: relative;}
</style>
<div class="col-md-12">
    <div class="expiration margin-topDefault confirmMenu">
        <form id="regervation_filter_frm" name="regervation_filter_frm" method="post" action="checkinvestment">
            <div class="input-group input-large date-picker input-daterange">
                <input type="text" name="from" data-provide="datepicker"  placeholder="To Date" class="datepicker form-control">
                <span class="input-group-addon">
                    to </span>
                <input type="text" name="to" data-provide="datepicker" placeholder="From Date" class="datepicker form-control">
            </div>
    </div>
    <input type="submit" class="btn btn-primary confirmOk" value="OK" name="submit" id="submit"/>
</form>
</div>

<?php //echo "<pre>"; print_r($orderObject); ?>
<div class="main">
    <div class="container">

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-10 col-sm-9">

                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'city-grid',
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
                            'header' => '<span style="white-space: nowrap;">Sl. No &nbsp; &nbsp; &nbsp;</span>',
                            'value' => '$row+1',
                        ),
                        array(
                            'name' => 'id',
                            'header' => '<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                            'value' => 'isset($data["full_name"])? ucwords($data["full_name"]):""',
                        ),
                        array(
                            'name' => 'id',
                            'header' => '<span style="white-space: nowrap;">Package &nbsp; &nbsp; &nbsp;</span>',
                            'value' => 'isset($data["name"])? $data["name"]:""',
                        ),
                        array(
                            'name' => 'id',
                            'header' => '<span style="white-space: nowrap;">Paid Amount &nbsp; &nbsp; &nbsp;</span>',
                            'value' => 'isset($data["paid_amount"])? number_format($data["paid_amount"],2):""',
                        ),
                        array(
                            'name' => 'id',
                            'header' => '<span style="white-space: nowrap;">Position &nbsp; &nbsp; &nbsp;</span>',
                            'value' => 'isset($data["position"])? $data["position"]:""',
                        ),
                    ),
                ));
                ?>


            </div>
        </div>
