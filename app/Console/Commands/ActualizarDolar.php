<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Dolar;

class ActualizarDolar extends Command
{
    protected $signature = 'dolar:actualizar';
    protected $description = 'Actualiza la cotización del dólar mayorista';

    public function handle(): int
    {
        try {
            $response = Http::timeout(5)
                ->get('https://dolarapi.com/v1/dolares/mayorista');

            if (!$response->successful()) {
                $this->error('API no respondió correctamente');
                return Command::FAILURE;
            }

            $data = $response->json();

            Dolar::updateOrCreate(
                ['tipo' => 'mayorista'],
                [
                    'compra' => $data['compra'],
                    'venta' => $data['venta'],
                    'actualizado_api' => $data['fechaActualizacion'],
                ]
            );

            $this->info('Dólar mayorista actualizado');
            return Command::SUCCESS;

        } catch (\Throwable $e) {
            $this->error('Error al consultar la API');
            return Command::FAILURE;
        }
    }
}
