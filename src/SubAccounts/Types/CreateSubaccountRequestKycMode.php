<?php

namespace Vobiz\SubAccounts\Types;

enum CreateSubaccountRequestKycMode: string
{
    case PersonalUse = "personal_use";
    case CustomerUse = "customer_use";
}
