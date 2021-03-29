<?php

use Illuminate\Support\Facades\Route;
use App\Categoria;
use App\Propiedad;


Route::get('/', function () {
    //return view('welcome');
    $data = Categoria::all();
    return response()->json($data);
});

Route::get('/crearpropiedad', function () {
    //return view('welcome');
    $Propiedad = new Propiedad;
    $Propiedad->titulo = "Departamentos edificio Torre Empresarial"; 
    $Propiedad->descripcion = "Hermosos departamentos en zona exclusiva "; 
    $Propiedad->precio = 1345000.00;
    $Propiedad->localizacion = "Centro, Villahermosa";
    $Propiedad->area = "450m2";
    $Propiedad->cuartos = 2;
    $Propiedad->baños = 2;
    $Propiedad->garages = 2;
    $Propiedad->categoria_id = 1;
    if($Propiedad->save()){
        $data = array(
            'status' => 'success',
            'message' => 'Propiedad creada correctamente',
            'propiedad' => $Propiedad
        );

    }else{
        $data = array(
            'status' => 'error',
            'message' => 'Propiedad no fue creada correctamente'
        ); 

    }

    return response()->json($data);
});