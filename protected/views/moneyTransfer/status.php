<?php
$this->breadcrumbs = array(
    'Money Transfer Status',
);
?>
<div class="error" id="error_msg" style="display: none;"></div>
<div class="col-md-7 col-sm-7">
<?php if(empty($error)){  ?>
    <fieldset> 
        <legend>Money Transfer Status</legend>
        <div class="form-group">

            <div class="col-lg-10">
                <?php 
                    if($transactionObject->status == 1){ ?>

                    <p class="success-2"><i class="fa fa-check-circle icon-success"></i><span class="span-success-2"><?php echo "Your Transaction is Successful";?></span></p>
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
        <div class="col-lg-8 padding-left-0 padding-top-20">     

            <a href="/MoneyTransfer/transfer"><button name="success" class="btn orange">New Transaction</button></a>                   

        </div>
    </div>
    <?php 
    }else{
        echo '<p style="padding: 25px 41px 37px;" class="error error-new"><span class="span-error">'.$error.'</span></p>' ;
    } 
    ?>

</div>

