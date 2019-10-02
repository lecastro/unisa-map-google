<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Geocoder\Facades\Geocoder;

class Geomap extends Model
{
    public $timestamps = false;

    protected $table = 'geolocation';

    protected $primaryKey = 'chapa';

    protected $fillable = [
        'chapa',
        'name',
        'job_description',
        'zip_code',
        'street',
        'number',
        'complement',
        'neighborhood',
        'uf',
        'city',
        'section_code',
        'section_description',
        'lat',
        'lng',
    ];

    public function getResults()
    {
        $resul = $this->where('lat', 0)->where('lng', 0)->count();
        //verificar se existe latitude e longitude com valor 0
        if ($resul > 0) {

            $resposnse = $this->where('lat', 0)->where('lng', 0)->get();

            foreach ($resposnse as $value) {

                $adresses = $value['street'] . ' ' . $value['number'] . ', ' . $value['city'] . ', ' . $value['uf'];

                //acessar a api do google maps passando o endereço e retorna a latitude e longitude
                $data[] = Geocoder::getCoordinatesForAddress($adresses);

                foreach ($data as $v) {

                    $response = $this->find($value['chapa']);

                    $response->update([
                        'lat' => $v['lat'],
                        'lng' => $v['lng'],
                    ]);
                }
            }
        }
        return $this->get();
    }

    public function filterResult($data)
    {
        dd($data);
    }
}
