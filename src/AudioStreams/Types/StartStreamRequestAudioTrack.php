<?php

namespace Vobiz\AudioStreams\Types;

enum StartStreamRequestAudioTrack: string
{
    case Inbound = "inbound";
    case Outbound = "outbound";
    case Both = "both";
}
