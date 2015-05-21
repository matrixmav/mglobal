<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/autocomplete.js');
$this->breadcrumbs = array(
    'Transfer Funds',
);
?>
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>
    <form class="form-horizontal" role="form" method="post" action="" autocomplete="off" >
        <fieldset> 
            <legend>Transfer Funds</legend>
            <?php
            if (!empty($walletObject)) {
                $walletPoints = 0;
                $rpPoints = 0;
                $commissionPoints = 0;
                foreach ($walletObject as $wallet) {

                    if ($wallet['type'] == 1) {
                        $walletPoints = $wallet['fund'];
                    }
                    if ($wallet['type'] == 2) {
                        $rpPoints = $wallet['fund'];
                    }
                    if ($wallet['type'] == 3) {
                        $commissionPoints = $wallet['fund'];
                    }
			} }
                ?>
                <div class="form-group">
                    <label for="transactiontype" class="col-lg-4 control-label">Choose Type of Transaction<span class="require">*</span></label>
                    <div class="col-lg-8">
                        <select id="transactiontype" name="transactiontype" class="form-control">
                            <option value="">Select Option</option>
                            <option value="1">Cash</option>
                            <option value="2">RP Wallet</option>	 
                            <option value="3">Commission Points</option>									   
                        </select>
                    </div>

                </div>
				 <div class="form-group">
                    <label for="totalcash" class="col-lg-4 control-label" id="transaction_data_label">Total<span class="require">*</span></label>
                    <input type="hidden" value="<?php echo $walletPoints; ?>" name="wallet_points" id="wallet_points">
                    <div class="col-lg-8">
					<div id="transaction_data" name="transaction_data" class="form-control">0</div>
                    </div></div>      
                <div class="form-group">
                    <label for="lastname" class="col-lg-4 control-label">Select To User <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" value="" placeholder="Search" id="adusername" name="username" required class="form-control">
                        <div id="results" >

                        </div>
                    </div>                                        
                </div>
                <div class="form-group">
                    <label for="paid_amount" class="col-lg-4 control-label">Amount Value <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="paid_amount" name="paid_amount"  required class="form-control">
                        <input type="hidden" value="<?php echo $rpPoints; ?>" name="rp_points" id="rp_points">
                        <input type="hidden" value="<?php echo $commissionPoints; ?>" name="commission_points" id="commission_points">
						<input type="hidden" value="<?php echo $username;?>" name="adminusername" id="adminusername">
                    </div>
                    <span id="email_error"></span>
                </div>


            </fieldset>
            <div class="row">
                <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">  
                    <input type="submit"  name="addfund" id="addfund" class="btn" value="Transfer Funds" />                 

                    <button type="reset" class="btn btn-default">Cancel</button>
                </div>
            </div>

    </form>
</div>