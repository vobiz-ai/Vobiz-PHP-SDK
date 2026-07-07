<?php

namespace Vobiz\Trunks\Types;

enum UpdateTrunkRequestTrunkDirection: string
{
    case Inbound = "inbound";
    case Outbound = "outbound";
}
