<?php

namespace App\Http\Livewire\Admin;

use App\Models\Livestock;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PanelSms extends Component
{
    public $option;
    public $typeLivestock;
    public $text;
   // public $type;

    protected $rules = [
        //'type' => 'required|in:50005708637753,SimCard,News',
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
        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new \SoapClient('http://payamak-service.ir/SendService.svc?wsdl', array('encoding'=>'UTF-8'));
        try {
            $parameters['userName'] = env('PANEL_SMS_USERNAME');
            $parameters['password'] = env('PANEL_SMS_PASSWORD');
            $parameters['fromNumber'] = "SimCard";
            $parameters['toNumbers'] = collect($this->typeLivestock)->values()->toArray();
            $parameters['messageContent'] = $this->text;
            $parameters['isFlash'] = false;
            $recId = array(0);
            $status = 0x0;
            $parameters['recId'] = &$recId ;
            $parameters['status'] = &$status ;
            $response = $sms_client->SendSMS($parameters)->SendSMSResult;
            if ($response == 0)
                $this->emit('register', 'success', "ارسال با موفقیت انجام شد.");
            else
                $this->emit('registerButton', 'error', " متاسفم ارسال انجام نشد، کد خطا: $response");
        }
        catch (Exception $e)
        {
            $this->emit('registerButton', 'error', "خطایی روی داده است لطفا لاگها را بررسی کنید. ");
            Log::error('Panel SMS: '. $e->getMessage());
        }

    }
}
