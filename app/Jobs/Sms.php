<?php

namespace App\Jobs;

use App\Sms\SmsIR_UltraFastSend;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class Sms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mobile;
    protected $dataSms;
    protected $template;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mobile,$dataSms,$template)
    {
        $this->mobile = $mobile;
        $this->dataSms = $dataSms;
        $this->template = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        date_default_timezone_set("Asia/Tehran");
        // your sms.ir panel configuration
        $APIKey = "96d8367c3be894fbafde367f";
        $SecretKey = "Abcd/1234Abcd!1234";

        $APIURL = "https://ws.sms.ir/";

        // message data
        $data = array(
            "ParameterArray" => (array)$this->dataSms,
            "Mobile" => (string)$this->mobile,
            "TemplateId" => (string)$this->template
        );

        $SmsIR_UltraFastSend = new SmsIR_UltraFastSend($APIKey, $SecretKey, $APIURL);
        $UltraFastSend = $SmsIR_UltraFastSend->ultraFastSend($data);
//        var_dump($UltraFastSend);

    }
}
