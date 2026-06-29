<?php

namespace Vobiz\Dtmf\Types;

enum SendDtmfRequestLeg: string
{
    case Aleg = "aleg";
    case Bleg = "bleg";
    case Both = "both";
}
