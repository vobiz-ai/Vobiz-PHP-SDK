<?php

namespace Vobiz\Sms\Types;

enum SmsNumberRegistrationKind: string
{
    case TenDlc = "10dlc";
    case TollFree = "toll_free";
    case None = "none";
}
