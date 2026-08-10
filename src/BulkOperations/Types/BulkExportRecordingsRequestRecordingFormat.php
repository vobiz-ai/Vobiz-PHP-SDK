<?php

namespace Vobiz\BulkOperations\Types;

enum BulkExportRecordingsRequestRecordingFormat: string
{
    case Mp3 = "mp3";
    case Wav = "wav";
}
