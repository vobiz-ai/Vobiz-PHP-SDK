<?php

namespace Vobiz\Sms\Types;

enum NumberBillingChargeStatus: string
{
    case Pending = "pending";
    case Paid = "paid";
    case Failed = "failed";
    case Refunded = "refunded";
}
