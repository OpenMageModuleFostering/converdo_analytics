<?php

class Converdo_Analytics_Support_Crypt
{
    /**
     * Encrypts a given input.
     *
     * @param  string       $input
     * @return string
     */
    public static function encrypt($input)
    {
        return @openssl_encrypt(base64_encode($input), 'AES-256-CFB', self::key());
    }

    /**
     * Decrypts a given input.
     *
     * @param  string       $input
     * @return string
     */
    public static function decrypt($input)
    {
        return @base64_decode(openssl_decrypt($input, 'AES-256-CFB', self::key()));
    }

    /**
     * Returns the encryption key.
     *
     * @return string
     */
    public static function key()
    {
        return (string) Mage::getStoreConfig('converdo/analytics/encryption');
    }
}