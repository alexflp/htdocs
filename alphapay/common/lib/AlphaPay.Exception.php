<?php

/**
 *
 * AlphaPay支付API异常类
 * @author Leijid
 *
 */
class AlphaPayException extends Exception
{
    public function errorMessage()
    {
        return $this->getMessage();
    }
}
