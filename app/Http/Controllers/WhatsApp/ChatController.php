<?php

namespace App\Http\Controllers\WhatsApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Validator;

class ChatController extends Controller
{
    private $filepath;
    private $chats;

    public function __construct() {
        $this->filepath = storage_path()."/json/chats.json";

        $this->chats = json_decode(file_get_contents($this->filepath), true); 
    }

    public function index() {
        for($i=0; $i<count($this->chats); $i++) {
            $this->chats[$i]["lastMessage"] = $this->chats[$i]["messages"][count($this->chats[$i]["messages"])-1];
            unset($this->chats[$i]["messages"]);
        }
        return $this->chats;
    }

    public function show($id) {
        return $this->_getChatById($id);
    }

    public function store(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'message' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return "Message is required";
        }

        $chat = $this->_getChatById($id);

        $messageContent = $request->input("message");
        $message = [
            "content" => $messageContent,
            "timestamp" => Carbon::now('Asia/Jakarta')->format('Y-m-d\TH:i:s\Z'),
            "isYou" => true,
            "isRead" => false,
        ];
        array_push($chat["messages"], $message);

        $this->_updateChatById($chat, $chat["id"]);

        $fp = fopen($this->filepath, 'w');
        fwrite($fp, json_encode($this->chats));
        fclose($fp);

        return $chat;
    }

    // Private Functions

    private function _getChatById($id) {
        foreach($this->chats as $chat) {
            if($chat["id"] == $id) return $chat;
        }
        return null;
    }

    private function _updateChatById($chat, $id) {
        for($i=0; $i<count($this->chats); $i++) {
            if($this->chats[$i]["id"] == $id) $this->chats[$i] = $chat;
        }
    }
}
