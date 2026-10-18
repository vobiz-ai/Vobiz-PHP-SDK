<?php

namespace Vobiz\Sms\Types;

enum RcsSuggestionType: string
{
    case Reply = "REPLY";
    case OpenUrl = "OPEN_URL";
    case DialPhone = "DIAL_PHONE";
    case ShowLocation = "SHOW_LOCATION";
    case RequestLocation = "REQUEST_LOCATION";
}
