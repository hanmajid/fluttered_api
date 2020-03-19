<?php

namespace App\Http\Controllers\WhatsApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CallController extends Controller
{
    private $filepath;
    private $calls;

    public function __construct() {
        $this->filepath = storage_path()."/json/calls.json";

        $this->calls = json_decode(file_get_contents($this->filepath), true); 
    }

    public function index() {
        return $this->calls;
    }
}
