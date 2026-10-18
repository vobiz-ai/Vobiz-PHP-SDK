<?php

namespace Vobiz\Sms\Types;

enum ConversationChannel: string
{
    case Sms = "sms";
    case Mms = "mms";
    case Rcs = "rcs";
}
