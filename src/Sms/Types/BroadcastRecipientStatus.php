<?php

namespace Vobiz\Sms\Types;

enum BroadcastRecipientStatus: string
{
    case Pending = "pending";
    case Sending = "sending";
    case Sent = "sent";
    case Delivered = "delivered";
    case Failed = "failed";
    case OptedOut = "opted_out";
    case Skipped = "skipped";
}
