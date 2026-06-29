<?php

namespace Vobiz\PartnerApi\Types;

enum ListKycSessionsRequestStatus: string
{
    case EmailSent = "email_sent";
    case LinkReady = "link_ready";
    case Opened = "opened";
    case InProgress = "in_progress";
    case KycCompleted = "kyc_completed";
    case Revoked = "revoked";
}
