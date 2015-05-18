<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Reports' => array('/admin/report/contact'),'Contacts'
);
?>

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
                    'name' => 'name',
                    'header' => '<span style="white-space: nowrap;">Full Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->name',
                ),
                
                array(
                    'name' => 'email',
                    'header' => '<span style="white-space: nowrap;">Email &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->email',
                ),
                array(
                    'name' => 'country_id',
                    'header' => '<span style="white-space: nowrap;">Country  &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->country->name+',
                ),
                array(
                    'name' => 'phone',
                    'header' => '<span style="white-space: nowrap;">Phone &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->phone',
                ),
                
            ),
        ));
        ?>
    </div>
</div>
