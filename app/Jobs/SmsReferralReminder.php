<?php

namespace App\Jobs;

use App\Traits\GeneralTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SmsReferralReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GeneralTrait;

    protected $receptor;
    protected $template;
    protected $token1;
    protected $token2;
    protected $token3;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($receptor, $template, $token1, $token2, $token3)
    {
        $this->receptor = $receptor;
        $this->template = $template;
        $this->token1   = $token1;
        $this->token2   = $token2;
        $this->token3   = $token3;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->sendSms($this->receptor, $this->template, $this->token1, $this->token2, $this->token3);
    }
}
