<?php

namespace Vobiz\Sms\Types;

enum MessageChannel: string
{
    case Sms = "sms";
    case Mms = "mms";
    case Rcs = "rcs";
}
