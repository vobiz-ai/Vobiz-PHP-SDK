<?php

namespace Vobiz\Sms\Types;

enum SmsNumberChannelsItem: string
{
    case Sms = "sms";
    case Mms = "mms";
    case Rcs = "rcs";
}
