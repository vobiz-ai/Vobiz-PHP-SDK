<?php

namespace Vobiz\PartnerApi\Types;

enum CreateKycSessionRequestReminderScheduleItemTrigger: string
{
    case DaysBeforeExpiry = "days_before_expiry";
}
