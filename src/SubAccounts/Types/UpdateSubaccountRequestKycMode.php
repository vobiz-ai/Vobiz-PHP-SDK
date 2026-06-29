<?php

namespace Vobiz\SubAccounts\Types;

enum UpdateSubaccountRequestKycMode: string
{
    case PersonalUse = "personal_use";
    case CustomerUse = "customer_use";
}
