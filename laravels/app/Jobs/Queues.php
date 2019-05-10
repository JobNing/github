<?php

namespace App\Jobs;

use App\Http\Controllers\yuekao\YueController;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Queues implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public $YueController;
    public function __construct($data,YueController $YueController)
    {
        $this->data = $data;
        $this->YueController = $YueController;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        $id = $data['ticket_id'];
        $num = $data['num'];
        $name = $data['name'];
        $this->YueController->y_movie->upds($id,$num);
        echo "减库存成功,你成功预定了$num 张$name 电影";
    }
}
