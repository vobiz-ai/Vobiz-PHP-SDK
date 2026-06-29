<?php

namespace Vobiz\PartnerApi\Types;

enum ListCustomerCdrsRequestStatus: string
{
    case Answered = "answered";
    case Failed = "failed";
    case Busy = "busy";
    case NoAnswer = "no_answer";
}
