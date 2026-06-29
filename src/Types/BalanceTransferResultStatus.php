<?php

namespace Vobiz\Types;

enum BalanceTransferResultStatus: string
{
    case Completed = "completed";
    case Failed = "failed";
}
