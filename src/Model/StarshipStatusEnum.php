<?php

namespace App\Model;

use phpDocumentor\Reflection\Types\String_;

enum StarshipStatusEnum: string
{
    case WAITING = "waiting";
    case IN_PROGRESS = "in progress";
    case COMPLETED = "completed";
}
