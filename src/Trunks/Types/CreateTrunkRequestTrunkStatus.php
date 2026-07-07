<?php

namespace Vobiz\Trunks\Types;

enum CreateTrunkRequestTrunkStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
