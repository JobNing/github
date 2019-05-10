<?php

namespace App\Jobs;

use App\Http\Controllers\Mq\MqController;
use App\Models\Article;
use App\Models\mq\Mq_indent;
use App\Models\mq\Mq_shop;
use App\Models\mq\Mq_user;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class Queue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    private $mqController = '';
    public function __construct($data,$mqController)
    {
        $this->data = $data;
        $this->mqController = $mqController;
    }

    /**
     * Execute the job.
     *
     * @return void11
     */
    public function handle()
    {
        $data = $this->data;
        $this->mqController->mq_user->upd($data['user_id'],$data['price']);
        $this->mqController->mq_shop->upd($data['shop_id'],$data['shop_num']);
        $this->mqController->mq_indent->upd($data['indent']);
        $sum = $data['sum'];
        echo "订单支付成功，消费$sum 元,邮件已成功发送";
    }
}
