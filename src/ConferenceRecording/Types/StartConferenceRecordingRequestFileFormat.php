<?php

namespace Vobiz\ConferenceRecording\Types;

enum StartConferenceRecordingRequestFileFormat: string
{
    case Mp3 = "mp3";
    case Wav = "wav";
}
