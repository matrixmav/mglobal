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
        if($userObject){
            echo "<pre>"; print_r($userListObject); exit;
        }
         ?>
    </div>
</div>
