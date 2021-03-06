<?php
/**
 * PhalApi_Crypt_RSA_KeyGenerator 生成器
 * 
 * RSA私钥或公钥的生成器
 *
 * @package     PhalApi\Crypt\RSA
 * @license     http://www.phalapi.net/license
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-03-15
 */

class PhalApi_Crypt_RSA_KeyGenerator {

    protected $privkey;

    protected $pubkey;

    public function __construct() {
        $res = openssl_pkey_new();
        openssl_pkey_export($res, $privkey);
        $this->privkey = $privkey;

        $pubkey = openssl_pkey_get_details($res);
        $this->pubkey = $pubkey['key'];
    }

    public function getPriKey() {
        return $this->privkey;
    }

    public function getPubKey() {
        return $this->pubkey;
    }
}
