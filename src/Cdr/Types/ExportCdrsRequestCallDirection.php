<?php

namespace Vobiz\Cdr\Types;

enum ExportCdrsRequestCallDirection: string
{
    case Inbound = "inbound";
    case Outbound = "outbound";
}
