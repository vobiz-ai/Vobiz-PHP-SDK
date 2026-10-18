<?php

namespace Vobiz\Sms\Types;

enum NumberBillingChargeKind: string
{
    case Purchase = "purchase";
    case Rental = "rental";
}
