<?php

function redirect($path)
{
    header('Location:' . BASEURL . $path);
    exit;
}

function backToPrev()
{
    echo "<script>window.history.back()</script>";
    exit;
}

function preventRequest()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        backToPrev();
        die;
    }
}
