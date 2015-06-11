<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">     
<div class="container domainSearch">
    <div class="row">
        <div class="col-sm-8 col-xs-12 col-lg-8">
            <div class="row">
                <form class="form-inline">
                    <div class="form-group col-sm-9  has-success has-feedback">
                        <form action="" method="post">
                        <input type="hidden" id="package_id" value="<?php echo Yii::app()->session['package_id']; ?>" class="form-control searchTxt">
                        <input placeholder="Enter Your Domain Name" type="text" name="domain" class="form-control searchTxt" data-id="field_domains-input" id="domain" maxlength="65" onkeyup="autocomplet();" onkeydown="if (event.keyCode == 13)
{document.getElementById('search').click(); return false;}">
                        </form> 
                        <!--<input type="search"  id="" placeholder="search" style="width: 100%;">-->
                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                    </div>
                    <!--<div class="form-group col-sm-3">
                        <button type="submit" class="btn btn-success btn-lg">Search Here</button>
                    </div>-->
                </form>
            </div>
            <div class="row" id="suggestedDomain">
                <div class="col-sm-12">
                    <h3>More domains to consider:</h3>
                </div>

            </div>
            <div id="secondaryDomainResults">
                <?php echo $suggestedDomain; ?> 
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <?php echo $rightbar; ?>
        </div>
    </div>
    <div class="clear80"></div>
</div>