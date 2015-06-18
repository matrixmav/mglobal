<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

'Hi,' . $model->full_name . '<br/> Congratulations! You have been registered successfully ' .
                        '<strong>Please click the link below to activate your account:</strong><br/>' .
                        '<a href="'.Yii::app()->getBaseUrl(true).'/user/confirm?activation_key=' . $rand . '">Click to activate </a>';