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

function formatRupiah($nominal)
{
    $fmt = numfmt_create('id_ID', NumberFormatter::CURRENCY);
    return $fmt->formatCurrency($nominal, 'IDR');
}

function intToMonth($int)
{
    $dateObj = DateTime::createFromFormat('!m', $int);
    return $dateObj->format('F');
}
