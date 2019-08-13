<?php

class Converdo_Support_Crypt
{
    /**
     * Encrypt a given input.
     *
     * @param $input
     * @return string
     */
    public static function encrypt($input)
    {
        return openssl_encrypt(base64_encode($input), 'AES-256-CFB', self::key());
    }

    /**
     * Decrypt a given input.
     *
     * @param $input
     * @return string
     */
    public static function decrypt($input)
    {
        return base64_decode(openssl_decrypt($input, 'AES-256-CFB', self::key()));
    }

    /**
     * Return the encryption key.
     *
     * @return string
     */
    public static function key()
    {
        return (string) Mage::getStoreConfig('converdo/analytics/encryption');
    }
}