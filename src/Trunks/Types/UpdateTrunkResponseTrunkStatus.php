<?php

namespace Vobiz\Trunks\Types;

enum UpdateTrunkResponseTrunkStatus: string
{
    case Active = "active";
    case Suspended = "suspended";
}
