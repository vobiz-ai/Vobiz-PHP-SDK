<?php

namespace Vobiz\Sms\Brands\Types;

enum BrandVetRequestType: string
{
    case Standard = "STANDARD";
    case Enhanced = "ENHANCED";
    case Political = "POLITICAL";
}
