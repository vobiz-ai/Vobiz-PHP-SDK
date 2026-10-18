<?php

namespace Vobiz\Sms\Types;

enum WebhookEvent: string
{
    case MessageStatus = "message.status";
    case MessageDelivered = "message.delivered";
    case MessageFailed = "message.failed";
    case MessageReceived = "message.received";
    case BroadcastUpdated = "broadcast.updated";
}
