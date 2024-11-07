<?php

function adminPanelProtect():void
{
    if(empty($_SESSION["is_admin"])) {
        $_SERVER ['DOCUMENT_ROOT'] . header('location: /');
    }
}

function userVerification():void
{
    if(!isset($_SESSION['user_id'])) {
        $_SERVER ['DOCUMENT_ROOT'] . header('location: /');
    }
}

