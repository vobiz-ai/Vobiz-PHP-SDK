<?php

namespace Vobiz\SubAccountKyc\Types;

enum CreateSubaccountKycSessionRequestFlowType: string
{
    case Email = "email";
    case Redirect = "redirect";
}
