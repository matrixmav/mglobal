
<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('/admin/index')
);
?>

<div class="expiration margin-topDefault">
    <a class="btn  green margin-right-20" style="float:left" href="/admin/user/add">New User +</a> 
    <!--<p>Client/ Hotel/ Bill : <?php //echo $clientObject->name; ?></p>-->
    <form id="user_filter_frm" name="user_filter_frm" method="post" action="/admin/user" />
    <div class="col-md-3">
        <input type="text" name="search" id="search" class="form-control" value="" />
    </div>
    <input type="submit" class="btn btn-primary" value="OK" name="submit" id="submit"/>
    </form>
  
</div>

<div class="row">
    <div class="col-md-12">
          <?php if(isset($_GET['successMsg']) && $_GET['successMsg']=='1'){?><div class="success" id="error_msg"><?php echo "User Added Successfully";?></div><?php }?>
          <?php if(isset($_GET['successMsg']) && $_GET['successMsg']=='2'){?><div class="success" id="error_msg"><?php echo "Record Deleted Successfully";?></div><?php }?>
          <?php if(isset($_GET['successMsg']) && $_GET['successMsg']=='3'){?><div class="success" id="error_msg"><?php echo "User Details Updated Successfully";?></div><?php }?>
        
              <?php
        $test = "'sdsd'";
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
                    'value' => '$data->full_name',
                ),
                array(
                    'name' => 'phone',
                    'header' => '<span style="white-space: nowrap;">Phone &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->phone',
                ),
                array(
                    'name' => 'email',
                    'header' => '<span style="white-space: nowrap;">Email &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->email',
                ),
                array(
                    'name' => 'sponsor_id',
                    'header' => '<span style="white-space: nowrap;">Sponser Id &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->sponsor_id',
                ),
                array(
                    'name' => 'sponsor_id',
                    'header' => '<span style="white-space: nowrap;">Address &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->userprofile->address)?$data->userprofile->address:""   ',
                ),
                array(
                    'name' => 'status',
                    'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Active\') : Yii::t(\'translation\', \'Inactive\')',
                ),
                array(
                    'name' => 'Quick Chat',
                    'value' => array($this,'getOnClickEvent'),
                ),
                

                array(
                    'class' => 'CButtonColumn',
                    'template' => '{Change}{Edit}{Delete}',
                    'htmlOptions' => array('width' => '30%'),
                    'buttons' => array(
//                        'Edit' => array(
//                            'label' => 'Edit',
//                            'options' => array('class' => 'btn purple fa fa-edit margin-right15'),
//                            'url' => 'Yii::app()->createUrl("admin/state/update", array("id"=>$data->id))',
//                        ),
                        'Change' => array(
                            'label' => Yii::t('translation', 'Change Status'),
                            'options' => array('class' => 'fa fa-success btn default black delete'),
                            'url' => 'Yii::app()->createUrl("admin/user/changestatus", array("id"=>$data->id))',
                        ),
                        
                       'Edit' => array(
                            'label' => Yii::t('translation', 'Edit'),
                            'options' => array('class' => 'fa fa-success btn default black delete'),
                            'url' => 'Yii::app()->createUrl("admin/user/edit", array("id"=>$data->id))',
                        ),
                        'Delete' => array(
                            'label' => Yii::t('translation', 'Delete'),
                            'options' => array('class' => 'fa fa-success btn default black delete','onclick' =>"js:alert('Do u want to delete this user?')"),
                            'url' => 'Yii::app()->createUrl("admin/user/deleteuser", array("id"=>$data->id))',
                        ),
                        
                        
                    ),
                ),
                
               
                
            ),
        ));
        ?>
    </div>
</div>
 

<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('/admin/user')
);
?>

<div class="expiration margin-topDefault">
    <!--<p>Client/ Hotel/ Bill : <?php //echo $clientObject->name; ?></p>-->
    <form id="user_filter_frm" name="user_filter_frm" method="post" action="/admin/user" />
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
                    'name' => 'id',
                    'header'=>'No.',
                    'value'=>'$row+1',
                ),
                array(
                    'name' => 'full_name',
                    'header' => '<span style="white-space: nowrap;">Full Name &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->full_name',
                ),
                array(
                    'name' => 'phone',
                    'header' => '<span style="white-space: nowrap;">Phone &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->phone',
                ),
                array(
                    'name' => 'email',
                    'header' => '<span style="white-space: nowrap;">Email &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->email',
                ),
                array(
                    'name' => 'sponsor_id',
                    'header' => '<span style="white-space: nowrap;">Sponser Id &nbsp; &nbsp; &nbsp;</span>',
                    'value' => '$data->sponsor_id',
                ),
                array(
                    'name' => 'sponsor_id',
                    'header' => '<span style="white-space: nowrap;">Address &nbsp; &nbsp; &nbsp;</span>',
                    'value' => 'isset($data->userprofile->address)?$data->userprofile->address:""   ',
                ),
                array(
                    'name' => 'status',
                    'value' => '($data->status == 1) ? Yii::t(\'translation\', \'Active\') : Yii::t(\'translation\', \'Inactive\')',
                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{Change}',
                    'htmlOptions' => array('width' => '30%'),
                    'buttons' => array(
//                        'Edit' => array(
//                            'label' => 'Edit',
//                            'options' => array('class' => 'btn purple fa fa-edit margin-right15'),
//                            'url' => 'Yii::app()->createUrl("admin/state/update", array("id"=>$data->id))',
//                        ),
                        'Change' => array(
                            'label' => Yii::t('translation', 'Change Status'),
                            'options' => array('class' => 'fa fa-success btn default black delete'),
                            'url' => 'Yii::app()->createUrl("admin/user/changestatus", array("id"=>$data->id))',
                        ),
                    ),
                ),
            ),
        ));
        ?>
    </div>
</div>
 
