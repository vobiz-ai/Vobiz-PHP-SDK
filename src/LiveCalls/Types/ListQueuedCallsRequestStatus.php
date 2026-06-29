<?php

namespace Vobiz\LiveCalls\Types;

enum ListQueuedCallsRequestStatus: string
{
    case Live = "live";
    case Queued = "queued";
}
