<?php

namespace Vobiz\Types;

enum PhoneNumberStatus: string
{
    case Active = "active";
    case Inactive = "inactive";
}
