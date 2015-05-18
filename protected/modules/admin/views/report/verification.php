<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
     'Reports' => array('/admin/report/verification'),'Verification'
);
?>

<div class="expiration margin-topDefault">
    <!--<p>Client/ Hotel/ Bill : <?php //echo $clientObject->name; ?></p>-->
    <form id="user_filter_frm" name="user_filter_frm" method="post" action="/admin/report/address" />
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
                    'name' => 'full_name',
                    'header' => '<span style="white-space: nowrap;">Full Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->user->full_name',
                ),
                
                array(
                    'name' => 'email',
                    'header' => '<span style="white-space: nowrap;">Address 1 &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->street',
                ),
                array(
                    'name' => 'sponsor_id',
                    'header' => '<span style="white-space: nowrap;">Address 2 &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->address',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">City &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->city_id',
                ),
                array(
                    'name' => 'id',
                    'header' => '<span style="white-space: nowrap;">State &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->state_id',
                ),
                array(
                    'name' => 'country_id',
                    'header' => '<span style="white-space: nowrap;">Country &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->country->name',
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
