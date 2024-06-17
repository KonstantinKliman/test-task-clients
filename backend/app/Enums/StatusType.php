<?php

namespace App\Enums;

enum StatusType: int
{
    case NotInWork = 1; //"Не в работе"
    case InWork = 2; //"В работе"
    case Refusal = 3; //"Отказ"
    case Closed = 4; //"Сделка закрыта"
}
