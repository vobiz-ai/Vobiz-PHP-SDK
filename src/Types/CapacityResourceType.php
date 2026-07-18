<?php

namespace Vobiz\Types;

enum CapacityResourceType: string
{
    case ConcurrentCalls = "concurrent_calls";
    case Cps = "cps";
}
