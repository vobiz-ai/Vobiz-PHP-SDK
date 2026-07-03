<?php

namespace Vobiz\PhoneNumbers\Types;

enum GetNumberHealthRequestGranularity: string
{
    case Daily = "daily";
    case Hourly = "hourly";
}
