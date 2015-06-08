<?php
$this->breadcrumbs = array(
    'Money Transfer Status',
);
?>
<div class="error" id="error_msg" style="display: none;"></div>
<div class="col-md-7 col-sm-7">

    <fieldset> 
        <legend>Money Transfer Status</legend>
        <div class="form-group">

            <div class="col-lg-10">
                <?php
                if($transactionObject->status == 1){ ?>
                <div class="success"><?php echo "Your Transaction is Success";?></div>
                <h1><b>Thank you.</b></h1>

                <h3>Your Transaction is successful</h3>
                <h4>
                Transfer To: <b><?php echo $transactionObject->user()->full_name; ?></b><br />
                Transaction Id :<b><?php echo $transactionObject->transaction_id; ?></b><br />
                Transferred Amount :$<b><?php echo $transactionObject->paid_amount; ?></b></h4><br />
               <?php } else { ?>
                <div class="error">Your Transaction is Failed. Try Again... </div>
                <h4>
                Transfer To: <b><?php echo $transactionObject->transaction_id; ?></b><br />
                Transaction Id :<b><?php echo $transactionObject->transaction_id; ?></b><br />
                Transferred Amount :$<b><?php echo $transactionObject->paid_amount; ?></b></h4><br />
               <?php } ?>
            </div>

        </div>



    </fieldset>
    <br>
    <div class="row">
        <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">     

            <a href="/MoneyTransfer/transfer"><button name="success" class="btn red">New Transaction</button></a>                   

        </div>
    </div>

</div>

