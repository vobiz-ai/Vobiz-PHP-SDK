<?php

namespace Vobiz\Types;

enum PartnerTransactionType: string
{
    case Recharge = "recharge";
    case Debit = "debit";
    case Adjustment = "adjustment";
    case Refund = "refund";
}
