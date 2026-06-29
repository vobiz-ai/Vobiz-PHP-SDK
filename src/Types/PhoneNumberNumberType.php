<?php

namespace Vobiz\Types;

enum PhoneNumberNumberType: string
{
    case Mobile = "mobile";
    case Landline = "landline";
    case TollFree = "toll_free";
}
