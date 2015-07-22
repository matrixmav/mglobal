<?php 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 
<?php if($error==''){?>
<div class="container domainSearch">
    <div class="row">
        <div class="col-sm-8 col-xs-12 col-lg-8">
            <div class="container">
 
</div>
            </div>
            </div>
        <div class="col-sm-8 col-xs-12 col-lg-8">
                               <div class="row">
		
                        
            <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-4 bs-wizard-step active">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Domain Search.</div>
                </div>
                
                <div class="col-xs-4 bs-wizard-step "><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Proceed Payment</div>
                </div>
                
                <div class="col-xs-4 bs-wizard-step "><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Make Payment</div>
                </div>
                
                
            </div>
        
        
        
        
        
	</div>
            <div class="row">
                <form class="form-inline">
                    <div class="form-group col-sm-12  has-success has-feedback" id="iconSuccess">
                        <form action="" method="post">
                        <input type="hidden" id="package_id" value="<?php echo Yii::app()->session['package_id']; ?>" class="form-control searchTxt">
                        <input placeholder="Enter Your Domain Name" type="text" name="domain" class="form-control searchTxt" data-id="field_domains-input" id="domain" style="width: 100%;" onkeyup="autocomplet();" onkeydown="if (event.keyCode == 13)
{document.getElementById('search').click(); return false;}">
                        </form> 
                        <!--<input type="search"  id="" placeholder="search" style="width: 100%;">-->
                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" id="icon"></span>
                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        
 
                    </div>
                    <!--<div class="form-group col-sm-3">
                        <button type="submit" class="btn btn-success btn-lg">Search Here</button>
                    </div>-->
                </form>
            </div>
            <div class="row" id="suggestedDomain" style="display:none;">
                <div class="col-sm-12">
                    <h3>More domains to consider:</h3>
                </div>

            </div>
            <div id="secondaryDomainResults" <?php if(Yii::app()->session['domain'] !=''){?> class="searchWrapBlur"<?php }?> >
                <?php echo $suggestedDomain; ?> 
            </div>
        </div>
        <div class="col-sm-3 col-xs-12 col-sm-offset-1">
            <?php echo $rightbar; ?>
        </div>
    </div>
    <div class="clear80"></div>
</div>
<input type="hidden" name="domainset" id="domainset" value="<?php echo Yii::app()->session['domain'];?>">
<?php }else{?>
     <div class="container">
    <div class="row"> 
   <?php echo "<p class='error'>Sorry! you have not chooseb any package yet. Please select any package</p>"; ?>
       </div>  
</div>     
<?php }?>
<input type="hidden" id="domainSelected" value="<?php echo (isset($_GET['tId'] ) || Yii::app()->session['domain'] !='') ? 1 : 0;?>">
 <script>
function autocomplet()
{

var package_id = $('#package_id').val(); 
var domain = $('#domain').val();
var min_length = 2; // min caracters to display the autocomplete
/*if(domain=='')
{
document.getElementById("error_msg").style.display="block";
document.getElementById("error_msg").innerHTML = "Please enter a domain name.";
document.getElementById("error_msg").focus();
}else{*/
if (domain.length >= min_length) {
var dataString = 'domain='+domain+'&package_id='+package_id;
var url = $('#URL').val();
$.ajax({
type: "GET",
url: "availabledomain",
data: dataString,
cache: false,
success: function(html){
if(html==''){
document.getElementById("secondaryDomainResults").innerHTML = "No domain found";
document.getElementById("suggestedDomain").style.display="block";
$('#icon').removeClass('glyphicon-ok');
$('#icon').addClass('glyphicon-remove');
$('#iconSuccess').addClass('has-error');
$('#iconSuccess').removeClass('has-success');

}else{   
document.getElementById("secondaryDomainResults").innerHTML = html;
document.getElementById("suggestedDomain").style.display="block";
$('#icon').addClass('glyphicon-ok');
$('#icon').removeClass('glyphicon-remove');
$('#iconSuccess').removeClass('has-error');
$('#iconSuccess').addClass('has-success');
}
}
});
}
//}
}

function DomainAdd(valz){
var package_id = $('#package_id').val();  
var domain1 = valz;
$('#domainset').val(domain1);
var amount = $('#amount').val();
var dataString = 'ajax=yes&domain='+domain1+'&package_id='+package_id+'&amount='+amount;  
var url = $('#URL').val();
$.ajax({
type: "GET",
url: "domainadd",
data: dataString,
cache: false,
success: function(html){
 var res = html.split("_");
 document.getElementById("domainTaken").innerHTML = res[0]+'<div class="closeImg" id="closeImg"> <a onclick="deleteData();" href="#"> <i class="fa fa-times"></i></a></div>';
 $('#secondaryDomainResults').addClass('searchWrapBlur');
 $('#domainSelected').val('1');
}

});//@ sourceURL=pen.js
}

function deleteData()
{
$('#secondaryDomainResults').removeClass('searchWrapBlur');
 document.getElementById("domainTaken").innerHTML = "";
 $('#domainSelected').val('0');
}    
	
function RedirectCart()
{
var domainSet  = $('#domainSelected').val();
if(domainSet=='0')
{
 alert("Please choose any domain first.");return false;  
}else{
location.href = '/package/productcart?tId=<?php echo isset($_GET['tId']) ? $_GET['tId'] : "";?>&templateId=<?php echo isset($_GET['templateId']) ? $_GET['templateId'] : "";?>'; 
 }
}
  </script>