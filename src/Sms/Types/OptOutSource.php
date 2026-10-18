<?php

namespace Vobiz\Sms\Types;

enum OptOutSource: string
{
    case Inbound = "inbound";
    case Manual = "manual";
}
