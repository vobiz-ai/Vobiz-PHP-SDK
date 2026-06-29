<?php

namespace Vobiz\Types;

enum SubAccountKycStatusKycMode: string
{
    case PersonalUse = "personal_use";
    case CustomerUse = "customer_use";
}
