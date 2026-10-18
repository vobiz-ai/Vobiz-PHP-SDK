<?php

namespace Vobiz\Sms\Messages\Types;

enum PreviewMessageCostRequestChannel: string
{
    case Sms = "sms";
    case Mms = "mms";
    case Rcs = "rcs";
}
