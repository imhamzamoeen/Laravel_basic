<?php

namespace App\Enum;

enum statusEnum:string {
    case Pending = 'pending';
    case Active = 'active';
    case Inactive = 'inactive';
    case Rejected = 'rejected';
}
