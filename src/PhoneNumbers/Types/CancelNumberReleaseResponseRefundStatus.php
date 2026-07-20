<?php

namespace Vobiz\PhoneNumbers\Types;

enum CancelNumberReleaseResponseRefundStatus: string
{
    case Success = "success";
    case Failed = "failed";
}
