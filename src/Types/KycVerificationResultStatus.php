<?php

namespace Vobiz\Types;

enum KycVerificationResultStatus: string
{
    case Verified = "verified";
    case Failed = "failed";
    case Pending = "pending";
}
