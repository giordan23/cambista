<?php

namespace App\Http\Livewire;

use App\Models\Price;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Prices extends Component
{
    public $origin_price, $alterar_compra, $alterar_venta, $nuevo_compra, $nuevo_venta, $actual_compra, $actual_venta;

    public $ActualizarPrecios = false;

    public function mount()
    {
        $actual_price = Price::find(1);

        $this->alterar_compra = $actual_price->modificador_compra;
        $this->alterar_venta = $actual_price->modificador_venta;

        $this->origin_price = $actual_price->origin_price;

        $this->actual_compra = $actual_price->actual_price_compra;
        $this->actual_venta = $actual_price->actual_price_venta;

    }

    public function render()
    {
        $actual_price = Price::find(1);
        // $nuevo_venta = $this->alter_venta * $actual_price;
        if(!$actual_price) {
            $actual_price = 0;
        }

        // dd($actual_price);
        return view('livewire.prices', compact('actual_price'))
            ->extends('layouts.app')
            ->section('dashboard');
            // ->extends('layouts.app')
            // ->section('dashboard');

    }

    public function ActualizarPrecios ($id) {

        $precioActual = Price::find($id);
        // dd($this->alterar_compra * $this->actual_compra);
        $precioActual->actual_price_compra = round($this->alterar_compra * $this->origin_price, 3);
        $precioActual->actual_price_venta = round($this->alterar_venta * $this->origin_price, 3);

        $precioActual->modificador_compra = $this->alterar_compra;
        $precioActual->modificador_venta = $this->alterar_venta;
        $precioActual->save();
        $this->actualizarAfterSave($precioActual->actual_price_compra, $precioActual->actual_price_venta);
        $this->ActualizarPrecios=false;
        return;

    }


    public function actualizarAfterSave($actualCompra, $actualVenta) {
        $this->actual_compra = $actualCompra;
        $this->actual_venta = $actualVenta;
        // $this->actual_compra = $actualVenta;
    }

    //solo ejecutar para guardar en la BD el valor que devuelve la API de alpha-vantage
    // public function precioOrigen() {

    //     // dd($this->alterar_venta);
    //     $response = Http::withHeaders([
    //         'x-rapidapi-host' => 'alpha-vantage.p.rapidapi.com',
    //         'x-rapidapi-key' => 'eee8abdc64mshbcc21d434354492p1a6f40jsn14e4d9d57eaa'
    //     ])->get('https://alpha-vantage.p.rapidapi.com/query?to_currency=PEN&function=CURRENCY_EXCHANGE_RATE&from_currency=USD');
    //     $dato = $response->json(['Realtime Currency Exchange Rate']);
    //     $data = round($dato["5. Exchange Rate"], 3);
    //     $actual_price = Price::find(1);
    //     $actual_price->origin_price = $data;
    //     $actual_price->actual_price_compra = round($this->alterar_compra * $this->origin_price, 3);
    //     $actual_price->actual_price_venta = round($this->alterar_venta * $this->origin_price, 3);

    //     $actual_price->modificador_compra = $this->alterar_compra;
    //     $actual_price->modificador_venta = $this->alterar_venta;
    //     $actual_price->save();
    //     // dd($actual_price);
    // }
}
