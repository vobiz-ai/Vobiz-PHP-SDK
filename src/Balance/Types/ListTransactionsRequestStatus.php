<?php

namespace Vobiz\Balance\Types;

enum ListTransactionsRequestStatus: string
{
    case Completed = "completed";
    case Pending = "pending";
    case Failed = "failed";
    case Cancelled = "cancelled";
}
