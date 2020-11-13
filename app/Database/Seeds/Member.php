<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class Member extends \CodeIgniter\Database\Seeder
{
    public function run()
    {

        for ($i = 0; $i < 20; $i++) {
            # code...
            $faker = \Faker\Factory::create('id_ID');

            // $data = [
            //     'member_nama' => $faker->name,
            //     'member_email'    => $faker->freeEmail,
            //     'member_pass'    => md5($faker->password),
            //     'member_phone'    => $faker->phoneNumber,
            //     'created_at' => Time::createFromTimestamp($faker->unixTime()),
            //     'updated_at' => Time::now(),
            // ];


            $jenis_event = ['belum mulai', 'sedang berjalan', 'telah selesai'];
            $acak_event  = rand(0, 2);
            $jenis_event[$acak_event];

            $data = [
                'event_nama' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'event_penyelenggara'    => $faker->company,
                'event_deskripsi'    => $faker->text,
                'event_tanggal'    => Time::createFromTimestamp($faker->unixTime()),
                'event_tempat'    => $faker->city,
                'event_peserta'    => rand(100, 1000),
                'event_peserta_isi'    =>  rand(20, 100),
                'event_status'    => $jenis_event[$acak_event],
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now(),
            ];


            // $this->db->table('member_table')->insert($data);
            $this->db->table('event_table')->insert($data);
        }
    }
}
