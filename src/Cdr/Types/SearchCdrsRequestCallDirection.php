<?php

namespace Vobiz\Cdr\Types;

enum SearchCdrsRequestCallDirection: string
{
    case Inbound = "inbound";
    case Outbound = "outbound";
}
