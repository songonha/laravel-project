<?php

function formatCurrency($price)
{
    return number_format($price, 0, ',', '.');
}

function formatDateDDMMYY($date)
{
    if (is_string($date)) {
        $date = date_create($date);
    }

    return $date->format('d/m/Y');
}

function formatDay($date)
{
    return date_format(new DateTime($date), 'd');
}

function formatMonthYear($date)
{
    return date_format(new DateTime($date), 'm-Y');
}

function firstImageWithUrlJson($url)
{
    return json_decode($url, true)[0]['name'];
}

function getAllImageWithUrlJson($url)
{
    return json_decode($url, true);
}
