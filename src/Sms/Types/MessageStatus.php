<?php

namespace Vobiz\Sms\Types;

enum MessageStatus: string
{
    case Scheduled = "scheduled";
    case Sent = "sent";
    case Delivered = "delivered";
    case Failed = "failed";
    case Received = "received";
    case Unknown = "unknown";
}
