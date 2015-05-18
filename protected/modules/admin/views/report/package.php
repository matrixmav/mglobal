<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Reports' => array('/admin/report/package'),'Package'
);
?>

<div class="expiration margin-topDefault">
    <!--<p>Client/ Hotel/ Bill : <?php //echo $clientObject->name; ?></p>-->
    <form id="user_filter_frm" name="user_filter_frm" method="post" action="/admin/report/package" />
    <div class="col-md-3">
        <input type="text" name="search" id="search" class="form-control" value="" />
    </div>
    <input type="submit" class="btn btn-primary" value="OK" name="submit" id="submit"/>
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
                    'name' => 'name',
                    'header' => '<span style="white-space: nowrap;">Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->name',
                ),
                 array(
                    'name' => 'amount',
                    'header' => '<span style="white-space: nowrap;">Amount &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->amount',
                ),
                array(
                    'name' => 'start_date',
                    'header' => '<span style="white-space: nowrap;">Start Date&nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->start_date',
                ),
                array(
                    'name' => 'end_date',
                    'header' => '<span style="white-space: nowrap;">End Date &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->end_date',
                ),
                array(
                    'name' => 'coupon_code',
                    'header' => '<span style="white-space: nowrap;">Coupon Code &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->coupon_code',
                ),
               
                array(
                    'name' => 'Description',
                    'header' => '<span style="white-space: nowrap;">Description &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->Description',
                ),
                array(
                    'name' => 'status',
                    'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Active\') : Yii::t(\'translation\', \'Inactive\')',
                ),
            ),
        ));
        ?>
    </div>
</div>
