<?php

namespace Vobiz\Sms\Types;

enum BroadcastStatus: string
{
    case Draft = "draft";
    case Scheduled = "scheduled";
    case Running = "running";
    case Paused = "paused";
    case Completed = "completed";
    case Cancelled = "cancelled";
    case Failed = "failed";
}
