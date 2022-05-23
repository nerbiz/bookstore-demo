<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    use DispatchesJobs, DisableAuthorization;
}
