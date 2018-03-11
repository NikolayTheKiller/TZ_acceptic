<?php

class SiteController {
    public function actionIndex(){
        
        include_once ROOT.'/view/index.php';
        return TRUE;
    }
}
