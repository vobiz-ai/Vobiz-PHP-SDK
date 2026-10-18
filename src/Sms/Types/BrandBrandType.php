<?php

namespace Vobiz\Sms\Types;

enum BrandBrandType: string
{
    case TendlcPrivateCompany = "TENDLC_PRIVATE_COMPANY";
    case TendlcPublicCompany = "TENDLC_PUBLIC_COMPANY";
    case TendlcNonProfit = "TENDLC_NON_PROFIT";
    case TendlcGovernment = "TENDLC_GOVERNMENT";
    case TollFreeNumber = "TOLL_FREE_NUMBER";
}
