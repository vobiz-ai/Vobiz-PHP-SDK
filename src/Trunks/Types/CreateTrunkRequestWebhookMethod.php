<?php

namespace Vobiz\Trunks\Types;

enum CreateTrunkRequestWebhookMethod: string
{
    case Post = "POST";
    case Get = "GET";
}
