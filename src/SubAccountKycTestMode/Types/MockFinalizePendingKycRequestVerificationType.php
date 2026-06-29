<?php

namespace Vobiz\SubAccountKycTestMode\Types;

enum MockFinalizePendingKycRequestVerificationType: string
{
    case Pan = "pan";
    case Aadhaar = "aadhaar";
    case Gst = "gst";
    case Cin = "cin";
}
