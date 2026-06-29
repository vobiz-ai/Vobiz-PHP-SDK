<?php

namespace Vobiz\Types;

enum KycVerificationResultVerificationType: string
{
    case Pan = "pan";
    case Gst = "gst";
    case Cin = "cin";
    case Aadhaar = "aadhaar";
}
