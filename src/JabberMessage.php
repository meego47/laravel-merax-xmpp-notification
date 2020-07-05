<?php

namespace LaravelMerax\XmppNotification;

class JabberMessage
{
    public $payload = [];

    public function __construct($content = '')
    {
        $this->content($content);
    }

    public static function create($content = '')
    {
        return new static($content);
    }

    public function to($jabberId)
    {
        $this->payload['chat_id'] = $jabberId;

        return $this;
    }

    public function content($content)
    {
        $this->payload['text'] = $content;

        return $this;
    }

    public function options(array $options)
    {
        $this->payload = array_merge($this->payload, $options);

        return $this;
    }

    public function toNotGiven()
    {
        return ! isset($this->payload['chat_id']);
    }

    public function toArray()
    {
        return $this->payload;
    }
}
