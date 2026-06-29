<?php

namespace Vobiz\RecordCalls\Types;

enum StartRecordingRequestRecordChannelType: string
{
    case Mono = "mono";
    case Stereo = "stereo";
}
