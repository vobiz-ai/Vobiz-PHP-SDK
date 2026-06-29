<?php

namespace Vobiz\LiveCalls\Types;

enum GetQueuedCallRequestStatus: string
{
    case Live = "live";
    case Queued = "queued";
}
