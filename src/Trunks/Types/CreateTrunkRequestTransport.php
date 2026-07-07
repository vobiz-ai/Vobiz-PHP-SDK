<?php

namespace Vobiz\Trunks\Types;

enum CreateTrunkRequestTransport: string
{
    case Udp = "udp";
    case Tcp = "tcp";
    case Tls = "tls";
}
