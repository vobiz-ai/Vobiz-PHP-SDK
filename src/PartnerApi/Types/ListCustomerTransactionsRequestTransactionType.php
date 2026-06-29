<?php

namespace Vobiz\PartnerApi\Types;

enum ListCustomerTransactionsRequestTransactionType: string
{
    case Recharge = "recharge";
    case Debit = "debit";
    case Refund = "refund";
    case Transfer = "transfer";
}
