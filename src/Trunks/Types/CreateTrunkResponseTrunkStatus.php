<?php

namespace Vobiz\Trunks\Types;

enum CreateTrunkResponseTrunkStatus: string
{
    case Active = "active";
    case Suspended = "suspended";
}
