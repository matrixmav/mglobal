<?php foreach($builderObjectCss as $builderObjectListCss){ ?>
    <link href="/user/template/<?php echo $builderObjectmeta->folderpath; ?>/css/<?php echo $builderObjectListCss->name ?>" rel="stylesheet" type="text/css" media="all" />
<?php } ?>

<?php
    foreach($builderObjectJs as $builderObjectListJs){ ?>
    <script src="/user/template/<?php echo $builderObjectmeta->folderpath; ?>/js/<?php echo $builderObjectListJs->name ?>" ></script>
<?php } 
    /* For getting JS */
    if($builderObject->custom_js){ echo '<script type="text/javascript"> '. stripslashes($builderObject->custom_js) ." </script>"; } ?>

</head>	

<body>   
    
<?php 
    /* For getting root div */
    if($builderTempId){ echo stripslashes($builderTempId->main_div); } 

    /* Getting header content and Replace Logo and Menu */
    $userHeader = stripslashes($builderObject->temp_header); 
    $removeSpaces = preg_replace('/\s+/', ' ', $userHeader);    
    $logoReplace = preg_replace('#<div class="mav_logo">(.*?)</div>#', stripslashes($logoImage) , $removeSpaces);            
    echo $result = preg_replace('#<div class="mav_menu">(.*?)</div>#', stripslashes($bb) , $logoReplace);
    
    /* For the contact form */
    if($responseForm){     
        echo stripslashes($responseForm) ;
//        $pageContent1 = stripslashes($pageContent);
//        $removeSpaces = preg_replace('/\s+/', ' ', $pageContent1);
      //  echo $pageContent2 = preg_replace('#<div class="mav_contact_form">(.*?)</div>#', stripslashes($responseForm) , $removeSpaces);               
           
    }else{
        echo $pageContent;
    }

    /* Getting the footer content */
    echo stripslashes($builderObject->temp_footer);    

    /* Getting Custom Css Code */
    if($builderObject->custom_css){ echo "<style>". stripslashes($builderObject->custom_css) ."</style>"; }
    
    // for the root div closing.
    if($builderTempId){ echo '</div>';}

 ?>
    
</body>
</html>

<!--
Logo class="mav_logo"
Menu class="mav_menu"
contact form class="mav_contact_form"
Content Area class="mav_content"
Footer class="mav_footer"
-->