<?php

namespace Converdo\Magento\Log;

use Converdo\Common\Log\LoggerInterface;
use Converdo\Common\Log\LogReader;
use Mage;
use Zend_Log;

class Logger implements LoggerInterface
{
    /**
     * System is unusable.
     *
     * @param  string           $message
     * @param  array            $context
     * @return void
     */
    public function emergency($message, array $context = [])
    {
        Mage::log($this->interpolate($message, $context), Zend_Log::EMERG, $this->output());
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param  string           $message
     * @param  array            $context
     * @return void
     */
    public function alert($message, array $context = [])
    {
        Mage::log($this->interpolate($message, $context), Zend_Log::ALERT, $this->output());
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param  string           $message
     * @param  array            $context
     * @return void
     */
    public function critical($message, array $context = [])
    {
        Mage::log($this->interpolate($message, $context), Zend_Log::CRIT, $this->output());
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param  string           $message
     * @param  array            $context
     * @return void
     */
    public function error($message, array $context = [])
    {
        Mage::log($this->interpolate($message, $context), Zend_Log::ERR, $this->output());
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param  string           $message
     * @param  array            $context
     * @return void
     */
    public function warning($message, array $context = [])
    {
        Mage::log($this->interpolate($message, $context), Zend_Log::WARN, $this->output());
    }

    /**
     * Normal but significant events.
     *
     * @param  string           $message
     * @param  array            $context
     * @return void
     */
    public function notice($message, array $context = [])
    {
        Mage::log($this->interpolate($message, $context), Zend_Log::NOTICE, $this->output());
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param  string           $message
     * @param  array            $context
     * @return void
     */
    public function info($message, array $context = [])
    {
        Mage::log($this->interpolate($message, $context), Zend_Log::INFO, $this->output());
    }

    /**
     * Detailed debug information.
     *
     * @param  string           $message
     * @param  array            $context
     * @return void
     */
    public function debug($message, array $context = [])
    {
        Mage::log($this->interpolate($message, $context), Zend_Log::DEBUG, $this->output());
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param  mixed            $level
     * @param  string           $message
     * @param  array            $context
     * @return void
     */
    public function log($level, $message, array $context = [])
    {
        $this->info($message, $context);
    }

    /**
     * Interpolates context values into the message placeholders.
     *
     * @param  string           $message
     * @param  array            $context
     * @return string
     */
    protected function interpolate($message, array $context = array())
    {
        // build a replacement array with braces around the context keys
        $replace = [];

        foreach ($context as $key => $val) {
            // check that the value can be casted to string
            if (! is_array($val) && (! is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }

        // interpolate replacement values into the message and return
        return strtr($message, $replace);
    }

    /**
     * Returns the file name of the log file.
     *
     * @return string
     */
    protected function output()
    {
        return cvd_config()->environment()['log_file'];
    }

    public function tail($limit)
    {
        if ((int) $limit == 0) {
            return null;
        }

        $file = realpath(Mage::getBaseDir('var') . '/log/' . $this->output());

        if (! file_exists($file)) {
            return [];
        }

        return array_reverse(explode(PHP_EOL, LogReader::tailCustom($file, $limit)));
    }
}