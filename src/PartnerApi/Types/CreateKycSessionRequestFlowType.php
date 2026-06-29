<?php

namespace Vobiz\PartnerApi\Types;

enum CreateKycSessionRequestFlowType: string
{
    case Email = "email";
    case Redirect = "redirect";
}
