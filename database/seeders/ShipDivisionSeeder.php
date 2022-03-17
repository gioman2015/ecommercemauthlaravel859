<?php

namespace Database\Seeders;
use App\Models\ShipDivision;
use Illuminate\Database\Seeder;


class ShipDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipDivision::insert(['id'=>'1','division_name'=>'Antioquia','division_code'=>'5',]);
        ShipDivision::insert(['id'=>'2','division_name'=>'Atlantico','division_code'=>'8',]);
        ShipDivision::insert(['id'=>'3','division_name'=>'D.C.SantaFedeBogotá','division_code'=>'11',]);
        ShipDivision::insert(['id'=>'4','division_name'=>'Bolivar','division_code'=>'13',]);
        ShipDivision::insert(['id'=>'5','division_name'=>'Boyaca','division_code'=>'15',]);
        ShipDivision::insert(['id'=>'6','division_name'=>'Caldas','division_code'=>'17',]);
        ShipDivision::insert(['id'=>'7','division_name'=>'Caqueta','division_code'=>'18',]);
        ShipDivision::insert(['id'=>'8','division_name'=>'Cauca','division_code'=>'19',]);
        ShipDivision::insert(['id'=>'9','division_name'=>'Cesar','division_code'=>'20',]);
        ShipDivision::insert(['id'=>'10','division_name'=>'Cordova','division_code'=>'23',]);
        ShipDivision::insert(['id'=>'11','division_name'=>'Cundinamarca','division_code'=>'25',]);
        ShipDivision::insert(['id'=>'12','division_name'=>'Choco','division_code'=>'27',]);
        ShipDivision::insert(['id'=>'13','division_name'=>'Huila','division_code'=>'41',]);
        ShipDivision::insert(['id'=>'14','division_name'=>'LaGuajira','division_code'=>'44',]);
        ShipDivision::insert(['id'=>'15','division_name'=>'Magdalena','division_code'=>'47',]);
        ShipDivision::insert(['id'=>'16','division_name'=>'Meta','division_code'=>'50',]);
        ShipDivision::insert(['id'=>'17','division_name'=>'Nariño','division_code'=>'52',]);
        ShipDivision::insert(['id'=>'18','division_name'=>'NortedeSantander','division_code'=>'54',]);
        ShipDivision::insert(['id'=>'19','division_name'=>'Quindio','division_code'=>'63',]);
        ShipDivision::insert(['id'=>'20','division_name'=>'Risaralda','division_code'=>'66',]);
        ShipDivision::insert(['id'=>'21','division_name'=>'Santander','division_code'=>'68',]);
        ShipDivision::insert(['id'=>'22','division_name'=>'Sucre','division_code'=>'70',]);
        ShipDivision::insert(['id'=>'23','division_name'=>'Tolima','division_code'=>'73',]);
        ShipDivision::insert(['id'=>'24','division_name'=>'Valle','division_code'=>'76',]);
        ShipDivision::insert(['id'=>'25','division_name'=>'Arauca','division_code'=>'81',]);
        ShipDivision::insert(['id'=>'26','division_name'=>'Casanare','division_code'=>'85',]);
        ShipDivision::insert(['id'=>'27','division_name'=>'Putumayo','division_code'=>'86',]);
        ShipDivision::insert(['id'=>'28','division_name'=>'SanAndres','division_code'=>'88',]);
        ShipDivision::insert(['id'=>'29','division_name'=>'Amazonas','division_code'=>'91',]);
        ShipDivision::insert(['id'=>'30','division_name'=>'Guainia','division_code'=>'94',]);
        ShipDivision::insert(['id'=>'31','division_name'=>'Guaviare','division_code'=>'95',]);
        ShipDivision::insert(['id'=>'32','division_name'=>'Vaupes','division_code'=>'97',]);
        ShipDivision::insert(['id'=>'33','division_name'=>'Vichada','division_code'=>'99',]);
    }
}
