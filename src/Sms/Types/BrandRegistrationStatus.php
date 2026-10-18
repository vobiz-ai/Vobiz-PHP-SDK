<?php

namespace Vobiz\Sms\Types;

enum BrandRegistrationStatus: string
{
    case Active = "ACTIVE";
    case Pending = "PENDING";
    case Pending2Fa = "PENDING_2FA";
    case PendingAppeal = "PENDING_APPEAL";
    case Rejected = "REJECTED";
}
