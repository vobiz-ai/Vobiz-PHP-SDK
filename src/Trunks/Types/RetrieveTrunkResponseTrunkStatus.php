<?php

namespace Vobiz\Trunks\Types;

enum RetrieveTrunkResponseTrunkStatus: string
{
    case Active = "active";
    case Suspended = "suspended";
}
