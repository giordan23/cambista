<?php

namespace App\Console\Commands;

use App\Models\Price;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'para obtener el precio cada minuto';

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
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'alpha-vantage.p.rapidapi.com',
            'x-rapidapi-key' => 'eee8abdc64mshbcc21d434354492p1a6f40jsn14e4d9d57eaa'
        ])->get('https://alpha-vantage.p.rapidapi.com/query?to_currency=PEN&function=CURRENCY_EXCHANGE_RATE&from_currency=USD');
        $dato = $response->json(['Realtime Currency Exchange Rate']);
        $data = round($dato["5. Exchange Rate"], 3);
        $actual_price = Price::find(1);
        $actual_price->origin_price = $data;
        // $actual_price->origin_price = 3;
        $actual_price->actual_price_compra = round($actual_price->modificador_compra * $actual_price->origin_price, 3);
        $actual_price->actual_price_venta = round($actual_price->modificador_venta * $actual_price->origin_price, 3);

        $actual_price->save();
        info('desde cron');
        return 0;
    }
}
