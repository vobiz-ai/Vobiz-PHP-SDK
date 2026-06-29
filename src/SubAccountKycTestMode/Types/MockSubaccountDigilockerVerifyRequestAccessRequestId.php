<?php

namespace Vobiz\SubAccountKycTestMode\Types;

enum MockSubaccountDigilockerVerifyRequestAccessRequestId: string
{
    case MockArSuccess = "MOCK_AR_SUCCESS";
    case MockArFail = "MOCK_AR_FAIL";
}
