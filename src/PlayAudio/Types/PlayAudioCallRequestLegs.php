<?php

namespace Vobiz\PlayAudio\Types;

enum PlayAudioCallRequestLegs: string
{
    case Aleg = "aleg";
    case Bleg = "bleg";
    case Both = "both";
}
