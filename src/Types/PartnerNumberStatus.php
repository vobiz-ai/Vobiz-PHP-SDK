<?php

namespace Vobiz\Types;

enum PartnerNumberStatus: string
{
    case Active = "active";
    case Inactive = "inactive";
    case Expired = "expired";
}
