<?php

namespace Vobiz\SubAccounts\Types;

enum CreateSubaccountRequestBusinessType: string
{
    case Individual = "individual";
    case Proprietorship = "proprietorship";
    case PrivateLimited = "private_limited";
    case Llp = "llp";
    case Partnership = "partnership";
    case PublicLimited = "public_limited";
    case Trust = "trust";
    case Society = "society";
    case Huf = "huf";
    case Government = "government";
}
