<?php

namespace Vobiz\LiveCalls\Types;

enum GetLiveCallRequestStatus: string
{
    case Live = "live";
    case Queued = "queued";
}
