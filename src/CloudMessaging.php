<?php

namespace Rahat\FiciFirebaseServer;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification as MessagingNotification;

class CloudMessaging
{
    protected $factory;
    protected $cloudMEssaging;
    protected $notification;
    protected $topic;
    protected $additional_data;
    public function __construct()
    {
        $this->factory = (new Factory)
            ->withServiceAccount(__DIR__ . '/../cred/fici-app-firebase-adminsdk-ejfza-cb8b8b703d.json');

        $this->cloudMessaging = $this->factory->createMessaging();
    }

    public function setNotification(string $title, string $body): self
    {
        $this->notification = MessagingNotification::create(
            $title,
            $body
        );
        return $this;
    }

    public function setTopic(string $topic): self
    {

        $this->topic = $topic[0];
        return $this;
    }

    public function setData(array $data): self
    {
        $this->additional_data = $data;
        return $this;
    }

    public function send()
    {
        $message = CloudMessage::withTarget('topic', $this->topic)
            ->withNotification($this->notification)
            ->withData($this->additional_data)->send();
    }
}
