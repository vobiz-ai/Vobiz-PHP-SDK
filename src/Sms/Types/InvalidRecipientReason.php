<?php

namespace Vobiz\Sms\Types;

enum InvalidRecipientReason: string
{
    case MissingPhoneNumber = "missing phone number";
    case ContainsLettersOrSymbols = "contains letters or symbols";
    case TooShort = "too short";
    case TooLong = "too long";
    case NotAValidUsCanadaNumber = "not a valid US/Canada number";
    case NotAValidIndianMobileNumber = "not a valid Indian mobile number";
    case UnsupportedDefaultCountry = "unsupported defaultCountry";
}
