<?php

namespace Vobiz\Types;

enum PartnerCdrStatus: string
{
    case Answered = "answered";
    case Busy = "busy";
    case Failed = "failed";
    case NoAnswer = "no-answer";
    case Cancelled = "cancelled";
}
