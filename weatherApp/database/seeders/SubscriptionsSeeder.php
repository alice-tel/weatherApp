<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("subscriptions")->insert([
            [
                "id"=> 1,
                "company"=>10,
                "type"=>17,
                "start_date"=>'2006-03-01',
                "end_date"=>NULL,
                "price"=>142.95,
                "notes"=>NULL,
                "identifier"=>'SCHIP10',
                "token"=>'LKSDJFUI35NSFDG8M@KL',
            ],
            [
                "id"=>2,
                "company"=>11,
                "type"=>16,
                "start_date"=>'2009-05-01',
                "end_date"=>'2018-12-31',
                "price"=>125.82,
                "notes"=>NULL,
                "identifier"=>'EELDE11',
                "token"=>'MXCVLJBN8%KSD&LFG@DF',
            ],
            [
                "id"=>3,
                "company"=>11,
                "type"=>16,
                "start_date"=>'2019-01-01',
                "end_date"=>NULL,
                "price"=>113,
                "notes"=>NULL,
                "identifier"=>'EELDE211',
                "token"=>'MZXCBK&KJSDF%FSDM@LK',
            ],
            [
                "id"=>4,
                "company"=>12,
                "type"=>17,
                "start_date"=>'2019-01-01',
                "end_date"=>NULL,
                "price"=>190.6,
                "notes"=>NULL,
                "identifier"=>'KNMIE',
                "token"=>'KSDSFKJL7K234JKK$JK@JH',
            ],
            [
                "id"=>5,
                "company"=>13,
                "type"=>12,
                "start_date"=>'2020-08-01',
                "end_date"=>NULL,
                "price"=>24.99,
                "notes"=>NULL,
                "identifier"=>'HSBHO',
                "token"=>'234KJKOIER8%JJKSD@HJSDFLK',
            ],
            [
                "id"=>6,
                "company"=>14,
                "type"=>11,
                "start_date"=>'2017-08-01',
                "end_date"=>NULL,
                "price"=>49,
                "notes"=>NULL,
                "identifier"=>'HANZE14',
                "token"=>'94uisdHJIMM829*hjew$KJH',
            ],
            [
                "id"=>7,
                "company"=>15,
                "type"=>13,
                "start_date"=>'2024-01-01',
                "end_date"=>NULL,
                "price"=>104.35,
                "notes"=>'10 % KORTING',
                "identifier"=>'RUGUN15',
                "token"=>'KJSDFGNM878JN$KB#3SDM',
            ],
            [
                "id"=>8,
                "company"=>16,
                "type"=>15,
                "start_date"=>'2021-04-05',
                "end_date"=>NULL,
                "price"=>94,
                "notes"=>NULL,
                "identifier"=>'SHELL16',
                "token"=>'JKSDAL&DASF5BNNAS12$%JHFD#',
            ],
            [
                "id"=>9,
                "company"=>17,
                "type"=>14,
                "start_date"=>'2023-01-01',
                "end_date"=>NULL,
                "price"=>65,
                "notes"=>NULL,
                "identifier"=>'OXFOR17',
                "token"=>'KLSDF*JKDSF%N',
            ],
            [
                "id"=>10,
                "company"=>18,
                "type"=>16,
                "start_date"=>'2019-01-05',
                "end_date"=>NULL,
                "price"=>56.5,
                "notes"=>NULL,
                "identifier"=>'HAPAG18',
                "token"=>'LJKGJFSDLN^KJKJ&123MN%',
            ],

            ]);
    }
}
