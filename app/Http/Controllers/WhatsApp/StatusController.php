<?php

namespace App\Http\Controllers\WhatsApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    private $filepath;
    private $statuses;

    public function __construct() {
        $this->filepath = storage_path()."/json/statuses.json";

        $this->statuses = json_decode(file_get_contents($this->filepath), true); 
    }

    public function index() {
        for($i=0; $i<count($this->statuses); $i++) {
            $this->statuses[$i]["thumbnailPath"] = $this->statuses[$i]["images"][0]["path"];
            unset($this->statuses[$i]["images"]);
        }
        return $this->statuses;
    }

    public function show($id) {
        return $this->_getStatusById($id);
    }

    // Private Functions

    private function _getStatusById($id) {
        foreach($this->statuses as $status) {
            if($status["id"] == $id) return $status;
        }
        return null;
    }
}
