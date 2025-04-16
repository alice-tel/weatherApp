<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("relations")->insert([
            [
                "id"=> 1,
                "name"=>'Fokker',
                "first_name"=>'Anthony',
                "initials"=>'A.H.F.',
                "prefix"=>NULL,
                "company"=>10,
                "function"=>'Oprichter',
                "title"=>'dhr.',
                "email"=>'had.geen@mail.nl',
                "phone"=>'020-1029754',
            ],
            [
                "id"=>2,
                "name"=>'Buten',
                "first_name"=>'Boertje',
                "initials"=>'B.',
                "prefix"=>'van',
                "company"=>11,
                "function"=>'Grasmaaier',
                "title"=>'dhr.',
                "email"=>'b.van.buten@eeldeairport.nl',
                "phone"=>'+31 6 84753920',
            ],
            [
                "id"=>3,
                "name"=>'Zonneklaar',
                "first_name"=>'Anna',
                "initials"=>'A.',
                "prefix"=>NULL,
                "company"=>12,
                "function"=>'Weerspecialist',
                "title"=>'Mevr.',
                "email"=>'a.zonneklaar@eeldeairport.nl',
                "phone"=>'0634671946',
            ],
            [
                "id"=>4,
                "name"=>'Horst',
                "first_name"=>'Greta',
                "initials"=>'G.M.',
                "prefix"=>NULL,
                "company"=>13,
                "function"=>'Docent',
                "title"=>'Fraulein',
                "email"=>'g.horst@hsb.bremen.de',
                "phone"=>'+49 6096378923',
            ],
            [
                "id"=>5,
                "name"=>'Ploeg',
                "first_name"=>'Sake',
                "initials"=>'S.',
                "prefix"=>'van der',
                "company"=>14,
                "function"=>'The Boss',
                "title"=>'dhr.',
                "email"=>'s.van.der.pleog@pl.hanze.nl',
                "phone"=>'069876345',
            ],
            [
                "id"=>6,
                "name"=>'Zernike',
                "first_name"=>'Frits',
                "initials"=>'F.',
                "prefix"=>NULL,
                "company"=>15,
                "function"=>'Legend',
                "title"=>'dhr.',
                "email"=>'f.zernike@rug.nl',
                "phone"=>'0506783948',
            ],
            [
                "id"=>7,
                "name"=>'Buren',
                "first_name"=>'Willem',
                "initials"=>'W.A.',
                "prefix"=>'van',
                "company"=>16,
                "function"=>'Grootaandeelhouder',
                "title"=>'Z.M.',
                "email"=>'geheim',
                "phone"=>'dito',
            ],
            [
                "id"=>8,
                "name"=>'Tolkien',
                "first_name"=>'John',
                "initials"=>'J.R.R.',
                "prefix"=>NULL,
                "company"=>17,
                "function"=>'Scientist',
                "title"=>'Sir',
                "email"=>'ringmaster@oxforduni.co.uk',
                "phone"=>'+44304872940',
            ],
            [
                "id"=>9,
                "name"=>'Saint-Exup�ry',
                "first_name"=>'Antoine',
                "initials"=>'A.',
                "prefix"=>NULL,
                "company"=>18,
                "function"=>'Piloot',
                "title"=>'M.',
                "email"=>'le.petit.prince@hplloyd.fr',
                "phone"=>'+33 1078490348',
            ],
            [
                "id"=>10,
                "name"=>'Boorsma',
                "first_name"=>'Petra',
                "initials"=>'P.D.',
                "prefix"=>NULL,
                "company"=>16,
                "function"=>'Geoloog',
                "title"=>'Mevr.',
                "email"=>'p.d.boorsma@shell.nl',
                "phone"=>'0693847563',
            ],

        ]);
    }
}
