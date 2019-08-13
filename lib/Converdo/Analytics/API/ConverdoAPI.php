<?php

class Converdo_Analytics_API_ConverdoAPI
{
    public static function order()
    {
        return new Converdo_Analytics_API_Sections_ConverdoOrderAPI();
    }
}