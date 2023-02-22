<?php

class Middleware
{
    public static function setAllowed($role, $request = null)
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != $role) {
                backToPrev();
                die;
            }
        }

        if (isset($request)) {
            if ($_SERVER['REQUEST_METHOD'] != $request) {
                backToPrev();
                die;
            }
        }
    }
}
