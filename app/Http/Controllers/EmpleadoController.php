<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consultar datos almacenados y enviarlos a index.blade.php
        $datos['empleados']=Empleado::paginate(5);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDACION DE DEATOS NO LLENADOS EN EL FORM
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellidoPaterno'=>'required|string|max:100',
            'apellidoMaterno'=>'required|string|max:100',
            'correo'=>'required|email',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto requerida'
        ];
        $this->validate($request, $campos, $mensaje);
        
        //$datosEmpleado = request()->all();
        //recolecta los datos excepto el token
        $datosEmpleado = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datosEmpleado['foto']=$request->file('foto')->store('uploads','public');
        }
        Empleado::insert($datosEmpleado);
        // retorna los datos emviados
        //return response()->json($datosEmpleado);
        //enviamos un mensaje que confirma la creacion de usuario
        return redirect('empleado')->with('mensaje','Empleado agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // recuperar el id y enviar el formulario
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */

   public function update(Request $request, $id)
    {
        //VALIDACION DE DEATOS NO LLENADOS EN EL FORM
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellidoPaterno'=>'required|string|max:100',
            'apellidoMaterno'=>'required|string|max:100',
            'correo'=>'required|email',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            // 'foto.required'=>'La foto requerida'
        ];

        if ($request->hasFile('foto')) {
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje = ['foto.required'=>'La foto requerida'];
        }

        $this->validate($request, $campos, $mensaje);
        
    $datosEmpleado = request()->except(['_token','_method']);

    if ($request->hasFile('foto')) {
        $empleado = Empleado::findOrFail($id);
        Storage::delete('public/'.$empleado->foto);
        $datosEmpleado['foto']=$request->file('foto')->store('uploads','public');
    }

        Empleado::where('id', '=', $id)->update($datosEmpleado);    
        $empleado = Empleado::findOrFail($id);
        //return view('empleado.edit', compact('empleado'));

        return redirect('empleado')->with('mensaje','Empleado Actualizado');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // BUSCA INFROMACION A TARVEZ DE UN ID
        $empleado = Empleado::findOrFail($id);
        if (Storage::delete('public/'.$empleado->foto)) {
            Empleado::destroy($id);
        }
       
        // retorna mensaje en un json
        // return response()->json(['mensaje'=>'Empleado eliminado']);
        return redirect('empleado')->with('mensaje','Empleado Borrado');
    }
}
