<?php

namespace Vobiz\Types;

enum PartnerCdrDirection: string
{
    case Inbound = "inbound";
    case Outbound = "outbound";
}
