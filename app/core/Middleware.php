<?php

class Middleware
{
    public static function setAllowed($role)
    {
        if ($_SESSION['level'] != $role) {
            backToPrev();
        }
    }
}
