<?php

namespace App\Http\Livewire\Admin;

use App\Models\Livestock;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
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
        $parameters['UserName'] = env('PANEL_SMS_USERNAME');
        $parameters['Password'] = env('PANEL_SMS_PASSWORD');
        $parameters['From'] = $this->type;
        $parameters['To'] = collect($this->typeLivestock)->values()->toArray();
        $parameters['Message'] = $this->text;
        $data = json_encode($parameters);
        $url = "https://login.niazpardaz.ir/SMSInOutBox/Send";
        //$url = "http://payamak-service.ir/SendService.svc?wsdl";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json charset=UTF8',
        ])->post($url, [
            'params' => $data,
        ]);
        $response = json_decode($response->getBody(), true);
        dd($response);
    }
}
