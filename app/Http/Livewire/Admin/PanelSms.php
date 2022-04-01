<?php

namespace App\Http\Livewire\Admin;

use App\Models\Livestock;
use GuzzleHttp\Client;
use Livewire\Component;

class PanelSms extends Component
{
    public $option;
    public $typeLivestock;
    public $text;
    public $type;

    protected $rules = [
        'type' => 'required|in:50005708637753,SimCard,News',
        'text' => 'required|string|max:191',
        'typeLivestock.*' => 'required|numeric',
    ];

    public function mount()
    {
        $this->option = Livestock::all();
    }

    public function render()
    {
        return view('livewire.admin.panel-sms')->layout('layouts.admin-master');
    }

    public function send()
    {
        $parameters['userName'] = env('PANEL_SMS_USERNAME');
        $parameters['password'] = env('PANEL_SMS_PASSWORD');
        $parameters['fromNumber'] = $this->type;
        $parameters['toNumbers'] = collect($this->typeLivestock)->values()->toArray();
        $parameters['messageContent'] = $this->text;
        $parameters['isFlash'] = false;
        $recId = array(0);
        $status = 0x0;
        $parameters['recId'] = &$recId ;
        $parameters['status'] = &$status ;
        $data = json_encode($parameters);
        $url = "https://login.niazpardaz.ir/SMSInOutBox/Send";
        /*$client = new Client([
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json; charset=utf-8',
                'encoding'=>'UTF-8',
            ]
        ]);*/
        $client = new Client();
        $response = $client->post($url,[
            'json' => $data,
            'verify' => false,
        ]);
        $response = json_decode($response->getBody(), true);
        dd($response);
    }
}
