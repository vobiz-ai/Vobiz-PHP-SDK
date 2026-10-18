<?php

namespace Vobiz\Sms\Types;

enum SmsNumberRegistrationStatus: string
{
    case NotRegistered = "not_registered";
    case Draft = "draft";
    case Pending = "pending";
    case Approved = "approved";
    case Rejected = "rejected";
    case NotRequired = "not_required";
}
