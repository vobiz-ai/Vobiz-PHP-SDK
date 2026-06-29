<?php

namespace Vobiz\SpeakText\Types;

enum SpeakTextCallRequestLegs: string
{
    case Aleg = "aleg";
    case Bleg = "bleg";
    case Both = "both";
}
