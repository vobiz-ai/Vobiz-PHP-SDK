<?php

namespace Vobiz\Types;

enum SubAccountKycMode: string
{
    case PersonalUse = "personal_use";
    case CustomerUse = "customer_use";
}
