<?php
/* @var $this GenealogyController */
/* @var $model Genealogy */

$regVar = '';
$treeVar = '/admin/user/genealogy/';


$this->breadcrumbs = array(
    'Genealogies'
    
);
echo '<link rel="stylesheet" href="' . Yii::app()->getBaseUrl(true) . '/css/main.css">';
if (!empty($_GET) && $_GET['id'] != '') {
    echo '<div class="row"><div class="col-md-12"><span><a onclick="window.history.back(-1);" style="float:right;font-size:16px;color:#f15c2b;cursor:pointer;">Go Back >></a></span></div></div>';
}
echo '<div class="container">
      <div class="row">
     <div class="col-md-12"><div class="expiration margin-topDefault confirmMenu" style="display:inline-block;">
     <form action="" class="form-inline">
     <input type="text" class="form-control dvalid" name="name"  onchange="getFullName(this.value);" id="search_username"  value="'.$userObject->full_name.'" />
     <input type="button" name="submit" value="Search" onclick="submitform();" class="btn btn-primary confirmOk">';

echo '</div></div>';

echo '</div>
  <span>

                           <div class="tree">
                        <ul>';
if (count($genealogyListObject) > 0) {
    /* if they have chind with 1st layer */
    echo '<li>';
    echo $userObject->name ? '<a href="#" data-hint="This is a success hint that fades in" class="hint-top-s-small-t-notice">' . $userObject->name . "</a>" : '';

    echo '<ul>';

    foreach ($genealogyListObject as $genealogyObject) {

        if ($genealogyObject->position == 'left') {
            $chiId = $genealogyObject->user_id;
            $leftGenealogyListObject = BaseClass::getGenoalogyTree($chiId);
            if (count($leftGenealogyListObject) > 0) {
                echo '<li>';

                $leftCurrnetIdCount = BaseClass::getGenoalogyTree($chiId);
                /* Check for the link */
                $rightIdCount = count($leftCurrnetIdCount) >= 1 ? $treeVar . '?id=' . $genealogyObject->user_id : $regVar;
                echo $chiId = $genealogyObject->user_id ? '<a href="' . $rightIdCount . '">' . $genealogyObject->user->name . "</a>" : '';
                echo '<ul>';

                foreach ($leftGenealogyListObject as $leftGenealogyObject) {
                    $leftCurrnetIdCount = BaseClass::getGenoalogyTree($leftGenealogyObject->user_id);
                    /* Check for the link */

                    $leftUrl = Yii::app()->createUrl('/user/registration', array('spid' => $leftGenealogyObject->user->sponsor_id, 'position' => 'left'));
                    $rightIdCount = count($leftCurrnetIdCount) >= 1 ? $treeVar . '?id=' . $leftGenealogyObject->user->name : $leftUrl;
                    $naUrl = Yii::app()->createUrl('/user/registration', array('spid' => $genealogyObject->user->sponsor_id, 'position' => 'left'));

                    if ($leftGenealogyObject->position == 'left') {
                        echo $leftGenealogyObject->user_id ? '<li><a href=' . $rightIdCount . '>' . $leftGenealogyObject->user->name . "</a></li>" : '';
                    }
                    if ($leftGenealogyObject->position == 'right') {
                        echo $leftGenealogyObject->user_id ? '<li><a href=' . $rightIdCount . '>' . $leftGenealogyObject->user->name . "</a></li>" : '';
                    }
                }
                echo'</ul>
                                        </li>';
                echo '
                                        </ul>
                                            </li>
                                       </li>';
            } else {
                echo '<li>';
                $leftUrl = Yii::app()->createUrl('/user/registration', array('spid' => $genealogyObject->user->sponsor_id, 'position' => 'left'));
                echo $chiId = $genealogyObject->user_id ? '<a href="' . $leftUrl . '">' . $genealogyObject->user->name . "</a>" : '';
                echo '<ul>';
                echo '
                                        </ul>
                                        </li>
                                   </li>';
            }
        } else { //echo "right";exit;
            $chiId = $genealogyObject->user_id;
            $rightGenealogyListObject = BaseClass::getGenoalogyTree($chiId);
            if (count($rightGenealogyListObject) > 0) {
                echo '<li>';
                $rightCurrnetIdCount = BaseClass::getGenoalogyTree($genealogyObject->user_id);
                /* Check for the link */
                $rightIdCount = count($rightCurrnetIdCount) >= 1 ? $treeVar . '?id=' . $genealogyObject->user_id : $regVar;

                echo $chiId = $genealogyObject->user_id ? '<a href="' . $rightIdCount . '">' . $genealogyObject->user->name . "</a>" : '';
                echo '<ul>';

                foreach ($rightGenealogyListObject as $rightGenealogyObject) {
                    $rightCurrnetIdCount = BaseClass::getGenoalogyTree($rightGenealogyObject->user_id);
                    /* Check for the link */

                    $rightUrl = Yii::app()->createUrl('/user/registration', array('spid' => $rightGenealogyObject->user->sponsor_id, 'position' => 'right'));
                    $naUrl = Yii::app()->createUrl('/user/registration', array('spid' => $genealogyObject->user->sponsor_id, 'position' => 'right'));
                    $rightIdCount = count($rightCurrnetIdCount) >= 1 ? $treeVar . '?id=' . $rightGenealogyObject->user_id : $rightUrl;

                    if ($rightGenealogyObject->position == 'left') {
                        echo $rightGenealogyObject->user_id ? '<li><a href=' . $rightIdCount . '>' . $rightGenealogyObject->user->name . "</a></li>" : '';
                    }

                    if ($rightGenealogyObject->position == 'right') {
                        echo $rightGenealogyObject->user_id ? '<li><a href=' . $rightIdCount . '>' . $rightGenealogyObject->user->name . "</a></li>" : '';
                    }
                }
            } else {
                echo '<li>';
                $rightUrl = Yii::app()->createUrl('/user/registration', array('spid' => $genealogyObject->user->sponsor_id, 'position' => 'right'));
                echo $chiId = $genealogyObject->user_id ? '<a href="' . $rightUrl . '">' . $genealogyObject->user->name . "</a>" : '';
                echo '<ul>';
            }
            echo '
                                        </ul>
                                            </li>
                                       </li>';
        }
    }
} else {
    echo 'No Records Found';
}
echo '</ul>
                    </div>
                    
                </div>
            </div>';

echo '</span>
        </div>';
?>
<input type="hidden" name='userSearch' value='' id='search_user_id'>
<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true); ?>/css/hint.css">
<script type="text/javascript">
    function showusergeneo(userVal)
    {
        location.href = "/admin/user/genealogy?id=" + userVal;
    }
    function submitform()
    {
        var id = $('#search_user_id').val();
        if(id !='')
        {
        location.href = "/admin/user/genealogy?id=" + id;
        }
    }
</script>
<script type="text/javascript" src="/js/transaction.js"></script>