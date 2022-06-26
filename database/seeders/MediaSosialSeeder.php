<?php

namespace Database\Seeders;

use App\Models\MediaSosial;
use Illuminate\Database\Seeder;

class MediaSosialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        MediaSosial::create([
            'username' => 'intivestudio' ,
            'type' => 'instagram' ,
            'description' => 'https://instagram.com/intivestudio?igshid=YmMyMTA2M2Y='
        ]);

        MediaSosial::create([
            'username' => 'Intive Studio' ,
            'type' => 'linkedin' ,
            'description' => 'https://www.linkedin.com/company/intivestudio/'
        ]);        

        MediaSosial::create([
            'username' => 'Hello@intivestudio.com' ,
            'type' => 'gmail' ,
            'description' => 'Hello@intivestudio.com'
        ]);

        MediaSosial::create([
            'username' => 'Address Intive Studio' ,
            'type' => 'address' ,
            'description' => 'jl.pd.Wiyung Indah Utara VI no.33 , Wiyung Kec.Wiyung , Kota SBY , Jawa Timur - 60228'
        ]);

        
    }
}
