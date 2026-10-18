<?php

namespace Vobiz\Sms\Messages\Types;

enum ListMessagesRequestDirection: string
{
    case Out = "out";
    case In = "in";
}
