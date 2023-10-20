<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Entity;
use App\Models\Provider;
use App\Models\Services;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProviderImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $entity = Entity::where('name',$row[2])->first();
        $category = Category::where('name',$row[3])->first();
        $city = City::where('name',$row[4])->first();
        $country = Country::where('name',$row[5])->first();
        $user = new User([
            //
            'registeration_num'=>$row[0],
            'name'=>$row[1],
            'entity_id'=>$entity->id,
            'category_id'=>$category->id,
            'city_id'=>$city->id,
            'country_id'=>$country->id,
            'description'=>$row[6],
            'url'=>$row[14],
            'media'=>$row[15],
            'email'=>$row[19],
            'address'=>$row[20],
            'phone'=>$row[21],
            'user_type'=>'provider',
        ]);

        if($row[7] != null)
        {
            Services::create([
                'title'=>$row[7]
            ]);
        }

        
        if($row[8] != null)
        {
            Services::create([
                'title'=>$row[8]
            ]);
        }


        
        if($row[9] != null)
        {
            Services::create([
                'title'=>$row[9]
            ]);
        }

        
        if($row[10] != null)
        {
            Services::create([
                'title'=>$row[10]
            ]);
        }


        
        if($row[11] != null)
        {
            Services::create([
                'title'=>$row[11]
            ]);
        }

        
        if($row[12] != null)
        {
            Services::create([
                'title'=>$row[12]
            ]);
        }
        if($row[13] != null)
        {
            Services::create([
                'title'=>$row[13]
            ]);
        }
        return true;
    }
}
