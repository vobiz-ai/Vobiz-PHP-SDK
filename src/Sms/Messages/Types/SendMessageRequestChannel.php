<?php

namespace Vobiz\Sms\Messages\Types;

enum SendMessageRequestChannel: string
{
    case Sms = "sms";
    case Mms = "mms";
    case Rcs = "rcs";
}
