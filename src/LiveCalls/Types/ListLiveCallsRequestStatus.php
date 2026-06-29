<?php

namespace Vobiz\LiveCalls\Types;

enum ListLiveCallsRequestStatus: string
{
    case Live = "live";
    case Queued = "queued";
}
