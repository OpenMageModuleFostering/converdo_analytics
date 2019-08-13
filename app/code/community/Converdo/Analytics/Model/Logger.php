<?php

class Converdo_Analytics_Model_Logger
{
    /**
     * Writes a info-level entry to the log file.
     *
     * @param  $input
     * @return void
     */
    public static function info($input)
    {
        self::message($input, Zend_Log::INFO);
    }

    /**
     * Writes a debug-level entry to the log file.
     *
     * @param  $input
     * @return void
     */
    public static function debug($input)
    {
        self::message($input, Zend_Log::DEBUG);
    }

    /**
     * Writes a alert-level entry to the log file.
     *
     * @param  $input
     * @return void
     */
    public static function alert($input)
    {
        self::message($input, Zend_Log::ALERT);
    }

    /**
     * Writes a critical-level entry to the log file.
     *
     * @param  $input
     * @return void
     */
    public static function critical($input)
    {
        self::message($input, Zend_Log::CRIT);
    }

    /**
     * Writes a emergency-level entry to the log file.
     *
     * @param  $input
     * @return void
     */
    public static function emergency($input)
    {
        self::message($input, Zend_Log::EMERG);
    }

    /**
     * Writes a notice-level entry to the log file.
     *
     * @param  $input
     * @return void
     */
    public static function notice($input)
    {
        self::message($input, Zend_Log::NOTICE);
    }

    /**
     * Writes a warning-level entry to the log file.
     *
     * @param  $input
     * @return void
     */
    public static function warning($input)
    {
        self::message($input, Zend_Log::WARN);
    }

    /**
     * Writes the message to the log file.
     *
     * @param  string           $input
     * @param  string           $level
     */
    protected static function message($input, $level)
    {
        Mage::log($input, $level, 'ConverdoAnalytics.log');
    }
}