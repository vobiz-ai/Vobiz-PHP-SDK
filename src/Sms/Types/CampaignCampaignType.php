<?php

namespace Vobiz\Sms\Types;

enum CampaignCampaignType: string
{
    case TenDigitLongCode = "TEN_DIGIT_LONG_CODE";
    case TollFreeUnifiedNumber = "TOLL_FREE_UNIFIED_NUMBER";
    case TollFreeNumber = "TOLL_FREE_NUMBER";
    case ShortCode = "SHORT_CODE";
    case ExternalTenDigitLongCode = "EXTERNAL_TEN_DIGIT_LONG_CODE";
    case Dca2TenDigitLongCode = "DCA2_TEN_DIGIT_LONG_CODE";
    case TollFreeExternallyVerified = "TOLL_FREE_EXTERNALLY_VERIFIED";
    case RcsSenderLaunch = "RCS_SENDER_LAUNCH";
}
