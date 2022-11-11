<?php

use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            'nama' => 'tiket',
            'harga' => 50000,
            'deskripsi' => '-'
        ]);
    }
}
