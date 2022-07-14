<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Support\Flash;
Use App\Support\Message;
Use App\Support\Seo;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $message;
    protected $seo;

    public function __construct()
    {
        $this->flash = new Flash();
        $this->message = new Message();
        $this->seo = new Seo();
    }
}
