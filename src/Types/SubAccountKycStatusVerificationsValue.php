<?php

namespace Vobiz\Types;

enum SubAccountKycStatusVerificationsValue: string
{
    case NotStarted = "not_started";
    case Pending = "pending";
    case Verified = "verified";
    case Failed = "failed";
}
