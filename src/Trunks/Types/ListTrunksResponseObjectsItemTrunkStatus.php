<?php

namespace Vobiz\Trunks\Types;

enum ListTrunksResponseObjectsItemTrunkStatus: string
{
    case Active = "active";
    case Suspended = "suspended";
}
