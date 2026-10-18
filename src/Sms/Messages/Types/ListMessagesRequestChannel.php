<?php

namespace Vobiz\Sms\Messages\Types;

enum ListMessagesRequestChannel: string
{
    case Sms = "sms";
    case Mms = "mms";
    case Rcs = "rcs";
}
