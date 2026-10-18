<?php

namespace Vobiz\Sms\Types;

enum MessageDirection: string
{
    case Out = "out";
    case In = "in";
}
