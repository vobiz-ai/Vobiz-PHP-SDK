<?php

namespace Vobiz\Sms\Campaigns\Types;

enum CreateCampaignRequestCampaignType: string
{
    case TenDigitLongCode = "TEN_DIGIT_LONG_CODE";
    case ExternalTenDigitLongCode = "EXTERNAL_TEN_DIGIT_LONG_CODE";
    case Dca2TenDigitLongCode = "DCA2_TEN_DIGIT_LONG_CODE";
    case ShortCode = "SHORT_CODE";
    case RcsSenderLaunch = "RCS_SENDER_LAUNCH";
}
