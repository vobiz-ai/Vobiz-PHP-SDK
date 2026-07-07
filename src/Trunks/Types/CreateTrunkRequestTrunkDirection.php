<?php

namespace Vobiz\Trunks\Types;

enum CreateTrunkRequestTrunkDirection: string
{
    case Inbound = "inbound";
    case Outbound = "outbound";
}
