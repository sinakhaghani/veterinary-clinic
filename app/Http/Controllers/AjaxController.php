<?php


namespace App\Http\Controllers;


use App\Models\BirthCertificate;

/**
 * Class AjaxController
 * @package App\Http\Controllers
 */
class AjaxController
{
    /**
     * @return mixed
     */
    public function certificate()
    {
        http_response_code(200);
        return BirthCertificate::where('owner', request('owner'))->get();
    }

}
