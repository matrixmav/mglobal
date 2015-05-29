<?php
setcookie("Auth","",time()-3600);
die("<script>document.location.href='/site/logout';</script>");
?>