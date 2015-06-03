<?php
$this->breadcrumbs = array(
    'Confirm',
);
?>
<div class="col-md-7 col-sm-7">
    <form class="form-horizontal" role="form" method="post" action="" >
        <fieldset> 
            <legend>Transfer Confirmation</legend>
            <div class="form-group">
                <label for="lastname" class="col-lg-4 control-label">Actual Amount <span class="require">*</span></label>
                <div class="col-lg-8" >
                    <div class="form-control">
                        <?php
                        echo base64_decode($_GET['a']);
                        ?>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="master_code" class="col-lg-4 control-label">Master Code<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="password" class="form-control" id="master_code" name="master_code" required >
                    <input type="hidden" value="<?php echo base64_decode($_GET['tu']); ?>" name="tu">

                </div>
                <span id="email_error"></span>
            </div>
            <div class="form-group">
                <label for="master_code" class="col-lg-4 control-label">Comment<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea class="form-control" id="comment" name="comment" required> </textarea>


                </div>
                <span id="email_error"></span>
            </div>                                  

        </fieldset>
        <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <button type="submit"  name="confirm" class="btn">Confirm</button>
                <button type="button" class="btn">Cancel</button>
            </div>
        </div>
    </form>
</div>
