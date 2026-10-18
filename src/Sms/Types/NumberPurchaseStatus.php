<?php

namespace Vobiz\Sms\Types;

enum NumberPurchaseStatus: string
{
    case Pending = "pending";
    case Debited = "debited";
    case Purchased = "purchased";
    case PastDue = "past_due";
    case Failed = "failed";
    case Refunded = "refunded";
    case Released = "released";
}
