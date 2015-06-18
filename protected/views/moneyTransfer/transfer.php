<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/transaction.js');

$this->breadcrumbs = array(
    'Fund Transfer',
);
?>
<link rel="stylesheet" type="text/css" href="/metronic/assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/metronic/assets/plugins/select2/select2-metronic.css"/>
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>
    <?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>

    <form class="form-horizontal" role="form" method="post" action="" autocomplete="off">
        <fieldset> 
            <legend>Transfer Funds</legend>
                <div class="form-group">
                    <label for="transactiontype" class="col-lg-4 control-label">Choose Type of Transaction<span class="require">*</span></label>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-8">
                                <select id="transactiontype" name="walletId" class="form-control" onchange="getExistingFund(<?php echo $userId; ?>,this.value);">
                                    <option value="">Select Wallet</option>
                                    <option value="1">Cash</option>
                                    <option value="2">RP Wallet</option>	 
                                    <option value="3">Commission Points</option>									   
                                </select>
                                <span id="transaction_error" style="color:red"></span>
                            </div>
                            <div class="col-lg-4">
                                <input type="hidden" class="form-control" id="transaction_data_amt" name="transaction_data" value=""/>
                                <div id="transaction_data" name="transaction_data" class="form-control">0</div>
                                <span id="amount_error" style="color:red"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <input type="hidden" class="form-control" value="" id="search_user_id" name="search_user_id" />
                <div class="form-group">
                    <label for="lastname" class="col-lg-4 control-label">Select To User <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="search_username" name="username" onchange="getFullNameAdmin(this.value);" />
                        <span id="search_user_error" style="color:red"></span>
                    </div>     
                </div>
                <div class="form-group">
                    <label for="paid_amount" class="col-lg-4 control-label">Amount<span class="require"> * $</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="paid_amount" name="paid_amount"  class="form-control">
                       <span id="email_error" style="color:red"></span>
                    </div>
                    
                </div>


            </fieldset>
            <div class="row">
                <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">  
                    <input type="submit"  name="transfer" id="transfer" class="btn red" value="Transfer Funds" onClick="return validationfrom();"/>                     

                    <button type="reset" class="btn btn-default">Cancel</button>
                </div>
            </div>
    </form>
</div>
<script type="text/javascript" src="/metronic/assets/plugins/select2/select2.min.js"></script>
<style>
        #s2id_search_username{ width: 100% !important;}
</style>
