<?php

namespace Vobiz\SubAccountKycTestMode\Types;

enum MockFinalizePendingKycRequestOutcome: string
{
    case Verified = "verified";
    case Failed = "failed";
}
