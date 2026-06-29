<?php

namespace Vobiz\PartnerApi\Types;

enum ListCustomerCdrsRequestCallDirection: string
{
    case Inbound = "inbound";
    case Outbound = "outbound";
}
