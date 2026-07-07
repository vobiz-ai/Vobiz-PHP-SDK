<?php

namespace Vobiz\Trunks\Types;

enum UpdateTrunkRequestWebhookMethod: string
{
    case Post = "POST";
    case Get = "GET";
}
