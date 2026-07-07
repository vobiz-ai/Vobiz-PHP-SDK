<?php

namespace Vobiz\Trunks\Types;

enum UpdateTrunkRequestTransport: string
{
    case Udp = "udp";
    case Tcp = "tcp";
    case Tls = "tls";
}
