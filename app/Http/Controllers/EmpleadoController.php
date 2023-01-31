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
        // Get data from database
        $datos['empleados'] = Empleado::paginate(1);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        /**
         * Validate empy fields
         */
        $campos = [
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email',
            // 'Foto' => 'required|max:10000|mines:jpeg,png,jpg',
        ];
        // messages
        $mensajes = [
            'required' => 'El :attribute es requerido',
            // 'Foto.required' => 'La foto es requerida',
        ];

        $this->validate($request, $campos, $mensajes);

        //* Aqui se guarda los datos que vienen del form */
        // $datosEmpleado = request()->all();
        // Se quita el campo token del form
        $datosEmpleado = request()->except('_token');

        // Alterar la fotografia
        if($request->hasFile('Foto')){
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }


        // guardar en la db
        Empleado::insert($datosEmpleado);
        return redirect('empleado/')->with('message', 'Empleado agregado con exito');
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
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Get employer information form an id
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
        /**
         * Validate empy fields
         */
        $campos = [
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email',
        ];
        // messages
        $mensajes = [
            'required' => 'El :attribute es requerido',
        ];

        // if($request->hasFile('Foto')){
        //     $campos = ['Foto' => 'required|max:10000|mines:jpeg,png,jpg'];
        //     $mensajes = ['Foto.required' => 'La foto es requerida'];
        // }


        $this->validate($request, $campos, $mensajes);


        //update employee information from id
        $datosEmpleado = request()->except(['_method', '_token']);

         // Alterar la fotografia
         if($request->hasFile('Foto')){
            $empleado = Empleado::findOrFail($id);
            // delete photo
            Storage::delete('public/'.$empleado->Foto);

            // upload new photo
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Empleado::where('id', '=', $id)->update($datosEmpleado);

        $empleado = Empleado::findOrFail($id);
        // return view('empleado.edit', compact('empleado'));
        return redirect('empleado/')->with('message', 'Empleado editado con exito');
        // $datosEmpleado = request()->all();
        // return response()->json($datosEmpleado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        // img after all
        if(Storage::delete('public/'.$empleado->Foto)){
            // Delete employee
            Empleado::destroy($id);
        }
        // after delete, i will return back
        return redirect()->back()->with('message', 'Empleado eliminado exitosamente');
    }
}
