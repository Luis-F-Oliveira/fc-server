<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index(string $id)
    {
        $data = Data::find($id);

        if (empty($data)) {
            return abort(404, 'Registro não encontrado');
        }

        return redirect($data->url);
    }
}
