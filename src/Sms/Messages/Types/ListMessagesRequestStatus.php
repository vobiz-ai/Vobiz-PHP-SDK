<?php

namespace Vobiz\Sms\Messages\Types;

enum ListMessagesRequestStatus: string
{
    case Scheduled = "scheduled";
    case Sent = "sent";
    case Delivered = "delivered";
    case Failed = "failed";
    case Received = "received";
    case Unknown = "unknown";
}
