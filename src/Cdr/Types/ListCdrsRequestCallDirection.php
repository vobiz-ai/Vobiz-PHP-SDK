<?php

namespace Vobiz\Cdr\Types;

enum ListCdrsRequestCallDirection: string
{
    case Inbound = "inbound";
    case Outbound = "outbound";
}
