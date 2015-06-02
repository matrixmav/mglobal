<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/registration.js?ver=<?php echo strtotime("now");?>"></script>
<div class="main">
    <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-9">
               
                <div class="content-form-page">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                           <h1><?php //print_r($msg); ?></h1>
                           <?php 
                           if($getValue){ echo "<strong> Get Referral Amount :- </strong>".$getValue ; }
                           
                           if($userObject){ echo "<br/><br/><strong> Refferral User Name :- </strong>".$userObject->sponsor_id ; }
                           
                           ?>
                           
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>
