<link rel="stylesheet" href="/css/themes/font-awesome.min.css">
<div class="container">
    <div class="row">
        <div class="col-lg-12">    
            <div id="maincontent" class="pageWrp checkout abtest">
<div class="sectionWrp paymentOptions clearfix">
                        <p class="title"><span class="check">2.</span> <span class="txt">Make Payment</span> <span class="edit">edit</span></p>
                        <div id="paymentOption" style="display:none;">
                            <form id="walletform" name="walletform">  
                                <?php if ($walletObject) { ?>
                                    <div id="walletOption" class="col-sm-4">

                                        <?php
                                        $i = 1;
                                        foreach ($walletObject as $wallet) {
                                            if ($wallet->type == '1') {
                                                $walletname = 'Cash Wallet';
                                                $fund = $wallet->fund;
                                            }
                                            if ($wallet->type == '2') {
                                                $walletname = 'RP Wallet';
                                                $fund = $wallet->fund * 75 / 100;
                                            }
                                            if ($wallet->type == '3') {
                                                $walletname = 'Commision Wallet';
                                                $fund = $wallet->fund;
                                            }
                                            ?>
                                            <div class="col-sm-12 col-xs-12 tleft">
                                                <input id="box<?php echo $i; ?>" type="checkbox" value="<?php echo $fund; ?>" name="wallet_type" onclick="walletamountcalculation(<?php echo $wallet->id; ?>,<?php echo $fund; ?>);">
                                                <label for="box<?php echo $i; ?>"><?php echo $walletname; ?>&nbsp;($<?php echo $wallet->fund; ?>)  </label>
                                            </div>
                                            <?php $i++;
                                        }
                                        ?>
                                        <br/><br/>

                                    </div>
                               <?php } ?>
                           
                                <div class="payChoose col-sm-4">
                                    <div class="payOption clearfix">
                                        <div class="col-sm-12 col-xs-12 tleft">
                                            <input type="radio" id="myRadio" name="myRadio" value="paypal">
                                            <label for="myRadio">Paypal</label>

                                        </div>
                                    </div>
 </form>
                                    <form action="<?php echo Yii::app()->params['paypalurl']; ?>" method="post" id="frmPayPal">
                                        <input type="hidden" name="business" value="pnirbhaylal@maverickinfosoft.com">
                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" name="item_name" value="<?php echo $packageObject->name; ?>">
                                        <input type="hidden" name="item_number" value="1">
                                        <input type="hidden" name="credits" value="">
                                        <input type="hidden" name="userid" value="<?php echo Yii::app()->session['userid']; ?>">
                                        <input type="hidden" name="amount" value="<?php echo $packageObject->amount + Yii::app()->session['amount']; ?>" id="ppamount">
                                        <input type="hidden" name="no_shipping" value="1">
                                        <input type="hidden" name="currency_code" value="USD">
                                        <input type="hidden" name="handling" value="0">
                                        <input type="hidden" name="cancel_return" value="">
                                        <input type="hidden" id ="return" name="return" value="<?php echo Yii::app()->params['returnurl']; ?>transaction_id=<?php echo Yii::app()->session['transactionid']; ?>">
                                    </form>
                                </div>
                                <div class="col-sm-4  col-xs-12 amountTab" display="table" id="totalAmounDiv" style="display:none;">
                                    <table width="100%">
                                        <tr>
                                            <td> <div id="actualamountDiv">  Total Amount</div> </td>
                                            <td><span id="actualamount"></span></td>
                                        </tr>
                                        <tr>
                                            <td><div id="walletamountDiv">  Wallet Amount</div> </td>
                                            <td><span id="walletamount"></span></td>
                                        </tr>
                                        <tr>
                                            <td><div id="walletamountDiv"> Payable Amount </div></td>
                                            <td> <span id="payamount"></span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-10 col-xs-12 makeBtn"> <input type="button" value="Make Payment" onclick="makepayment();" class="btn btn-success btn-lg"></div>
                            
                        </div>
                    </div>
                 </div>
        </div>
    </div>
</div>