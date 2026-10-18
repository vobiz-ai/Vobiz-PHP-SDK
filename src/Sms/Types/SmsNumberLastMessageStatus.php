<?php

namespace Vobiz\Sms\Types;

enum SmsNumberLastMessageStatus: string
{
    case Scheduled = "scheduled";
    case Sent = "sent";
    case Delivered = "delivered";
    case Failed = "failed";
    case Received = "received";
    case Unknown = "unknown";
}
