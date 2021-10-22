<?php

namespace App\Console\Commands;

use App\Components\AuthClientService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:importdata';

    protected $description = 'Get data from jsonplaceholder';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::withHeaders([
            "auth"  => "58583866893jugjbt5096mkfboki95968845"
        ])->get("https://okipost.com/api/index.php", [
            "lang" => "ge",
            "action" => "login",
            "email"=> "denisbocharov12@gmail.com",
            "password"=> "YIP3b9F1WM"
        ]);
        return $response->json();
    }
}
