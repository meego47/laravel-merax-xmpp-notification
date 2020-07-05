<?php

namespace LaravelMerax\XmppNotification;

use Fabiang\Xmpp\Client;
use Fabiang\Xmpp\Protocol\Message;

class Jabber
{
    /** @var Client */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->client->connect();
    }

    public function __destruct()
    {
        $this->client->disconnect();
    }

    /**
     * Send message to user (jid = jabber id (user@jabberhost.net)).
     *
     * @param string $messageText
     * @param string $jid
     */
    public function sendMessage($messageText, $jid)
    {
        $message = new Message();
        $message->setMessage($messageText)->setTo($jid);
        $this->client->send($message);
    }
}
