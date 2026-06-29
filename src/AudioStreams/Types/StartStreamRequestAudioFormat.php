<?php

namespace Vobiz\AudioStreams\Types;

enum StartStreamRequestAudioFormat: string
{
    case Pcm = "pcm";
    case Mulaw = "mulaw";
}
