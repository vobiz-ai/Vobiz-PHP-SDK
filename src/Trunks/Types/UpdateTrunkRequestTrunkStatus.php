<?php

namespace Vobiz\Trunks\Types;

enum UpdateTrunkRequestTrunkStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
