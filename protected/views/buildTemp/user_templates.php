<?php 
$categoryObject = BuildTemp::model()->findByAttributes(array("template_id" => $builderObject->template_id));
$baseURL = Yii::app()->getBaseUrl(true); 
$cssURL = $baseURL."/user/template/".$categoryObject->folderpath.'/css/';
$jsURL = $baseURL."/user/template/".$categoryObject->folderpath.'/js/';

$tempHeader = str_replace('href="css/','href="'.$cssURL , stripslashes($builderObject->head_content)); 
echo $tempHead = str_replace('src="js/','src="'.$jsURL , $tempHeader); 

?>


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