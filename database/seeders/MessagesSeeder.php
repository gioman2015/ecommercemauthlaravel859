<?php

namespace Database\Seeders;
use App\Models\Messages;
use App\Models\PreciosEnvios;
use App\Models\DatosBanco;
use App\Models\HeaderConfig;

use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messsageWeb = Messages::create([
            'id' => 1,
            'type' => 'Web',
            'message' => 'Mensaje Web',
        ]);

        $messsageMail = Messages::create([
            'id' => 2,
            'type' => 'Mail',
            'message' => 'Mensaje E-Mail',
        ]);

        $enviosReg1 = PreciosEnvios::create([
            'id' => 1,
            'desde' => 1,
            'hasta' => 3,
            'type' => 'Regional',
            'price' => '8.600'
        ]);

        $enviosNac1 = PreciosEnvios::create([
            'id' => 2,
            'desde' => 1,
            'hasta' => 3,
            'type' => 'Nacional',
            'price' => '10.900'
        ]);

        $enviosReg2 = PreciosEnvios::create([
            'id' => 3,
            'desde' => 4,
            'hasta' => 5,
            'type' => 'Regional',
            'price' => '12.300'
        ]);

        $enviosNac2 = PreciosEnvios::create([
            'id' => 4,
            'desde' => 4,
            'hasta' => 5,
            'type' => 'Nacional',
            'price' => '16.000'
        ]);

        $enviosReg2 = PreciosEnvios::create([
            'id' => 5,
            'desde' => 6,
            'hasta' => 8,
            'type' => 'Regional',
            'price' => '16.300'
        ]);

        $enviosNac2 = PreciosEnvios::create([
            'id' => 6,
            'desde' => 6,
            'hasta' => 8,
            'type' => 'Nacional',
            'price' => '19.600'
        ]);

        $bancolombia = DatosBanco::create([
            'id' => 1,
            'banco' => 'Bancolombia',
            'tipo' => 'Tipo Cuenta Banc',
            'numero' => 'Nro Cuenta Banc',
            'cc' => 'Documento Titular Banc',
            'titular' => 'Nombre Titular Banc',
        ]);

        $davivienda = DatosBanco::create([
            'id' => 2,
            'banco' => 'Davivienda',
            'tipo' => 'Tipo Cuenta Dav',
            'numero' => 'Nro Cuenta Dav',
            'cc' => 'Documento Titular Dav',
            'titular' => 'Nombre Titular Dav',
        ]);

        $headerConfig = HeaderConfig::create([
            'id' => 1,
            'background_color' => '#141414',
            'background_imagen' => '',
        ]);
    }
}
