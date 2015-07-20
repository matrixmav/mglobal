<style>
	body
	{
	background:#f3f3f3;
	}
    .faqHeader {
        font-size: 27px;
        margin: 20px;
    }

    .panel-heading [data-toggle="collapse"]:after {
        font-family: 'Glyphicons Halflings';
        content: "\e072"; /* "play" icon */
        float: right;
        color: #F58723;
        font-size: 18px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
	.panel-default>.panel-heading
	{
	background-color: #fff;
  background-image: none;
	}
	.panel-group .panel + .panel
	{
	margin-top:0;
	}
	#option1, #option2, #option3, #option4, #option5, #option6, #option7, #option8, #option9
	{
	display:none;
	}
	.categories
	{
	background:#fff;
	border:1px solid #d7d7d7;
	
	}
	.categories h2
	{
	margin:0;
	padding:10px 5px;
	border-bottom:1px solid #d7d7d7;
	text-align:center;
	}
	.categories ul
	{
	padding:0;
	margin:0;
	}
	.categories li
	{
	list-style:none;
	border-bottom:1px solid #d7d7d7;
	padding:10px;
	}
	.categories li a
	{
	color:#434343
	}
	.categories li a:hover
	{
	color:#434343
	}
	.faq h2 {
  margin: 0;
  padding: 10px 5px;
  border-bottom: 1px solid #d7d7d7;
  text-align: left;
}
.bread_crum
{
padding:20px 0;
}
.bread_crum a
{
color:#434343
}
</style>

<div class="main">
      <div class="container">
      <div class="row margin-bottom-40">
   </div>
          
 

<div class="container">
<div class="col-sm-3">
<div class="categories">
<h2>FAQ's</h2>
<ul>
<li> <a href="#" onclick='show(1);'>General Questions</a> </li>
<li> <a href="#" onclick='show(2);'>FAQ2</a> </li>
<li> <a href="#" onclick='show(3);'>FAQ3</a> </li>
<li> <a href="#" onclick='show(4);'>FAQ4</a> </li>
</ul>
</div>
</div>

<div class="col-sm-9">
<div class="faq">
<div id="option1">
<div class="panel-group" id="accordion">
        <h2>General Questions</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                     Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                   Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum
                </div>
            </div>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="panel-body">
                   Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                   Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum
                </div>
            </div>
        </div>
</div>
</div>


<div id="option2">
<div class="panel-group" id="accordion">
        <h2>FAQ2
		</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                     Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                   Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum
                </div>
            </div>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="panel-body">
                   Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                   Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum
                </div>
            </div>
        </div>
</div>
</div>



<div id="option3">
<div class="panel-group" id="accordion">
        <h2>FAQ3</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                     Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum 
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">2. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                   Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum
                </div>
            </div>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">3. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="panel-body">
                   Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">4. Lorem ipsum dolor sit amet, consectetur adipiscing elit?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                   Quisque feugiat odio sed dolor maximus, sed posuere sapien placerat. Duis maximus placerat feugiat. Etiam volutpat leo eget nunc pulvinar, et venenatis massa vestibulum. Nullam non ex mauris. In in viverra tortor, eget scelerisque felis. Nam mollis eros quis nisi blandit, eu consequat nisi placerat. Nulla bibendum erat id felis condimentum
                </div>
            </div>
        </div>
</div>
</div>


</div>
</div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
    
    <script type="text/javascript">
document.getElementById("option1").style.display="block";
function show(nr) {
    document.getElementById("option1").style.display="none";
    document.getElementById("option2").style.display="none";
    document.getElementById("option3").style.display="none";

    document.getElementById("option"+nr).style.display="block";
}

</script>

    
    