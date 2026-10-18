<?php

namespace Vobiz\Sms\Types;

enum BroadcastPreviewSampleEncoding: string
{
    case Gsm7 = "GSM-7";
    case Ucs2 = "UCS-2";
}
