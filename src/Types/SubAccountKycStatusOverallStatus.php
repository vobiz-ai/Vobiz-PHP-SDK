<?php

namespace Vobiz\Types;

enum SubAccountKycStatusOverallStatus: string
{
    case NotStarted = "not_started";
    case Pending = "pending";
    case Verified = "verified";
    case Failed = "failed";
}
