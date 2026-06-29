<?php

namespace Vobiz\Types;

enum PartnerCustomerStatus: string
{
    case Active = "active";
    case Suspended = "suspended";
    case Inactive = "inactive";
}
