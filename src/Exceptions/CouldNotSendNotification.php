<?php

namespace LaravelMerax\XmppNotification\Exceptions;

use Exception;

class CouldNotSendNotification extends Exception
{
    public static function chatIdNotProvided()
    {
        return new static('Jabber notification XMPP ID was not provided. Please refer usage docs.');
    }

    public static function serviceRespondedWithAnError($response)
    {
        return new static('Descriptive error message.');
    }

    public static function invalidMessageObject($response)
    {
        return new static('Descriptive error message.');
    }
}
