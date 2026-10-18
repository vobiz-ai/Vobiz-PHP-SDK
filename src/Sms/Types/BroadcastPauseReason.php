<?php

namespace Vobiz\Sms\Types;

enum BroadcastPauseReason: string
{
    case InsufficientBalance = "insufficient_balance";
}
