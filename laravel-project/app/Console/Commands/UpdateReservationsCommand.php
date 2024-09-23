<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\IcalController;
use App\Services\IcalService;

class UpdateReservationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update reservations from iCal';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $controller = new IcalController(new IcalService());
        $response = $controller->updateReservations();

        $this->info($response->getContent());
    }
}
