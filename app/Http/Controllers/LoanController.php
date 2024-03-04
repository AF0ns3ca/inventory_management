<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Item;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Devuelve a la vista index con los prestamos
        return view('loans.index', [
            'loans' => Loan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        //devuelve a la vista create con el id del item y todos los objetos para poder hacer un select con ellos
        return view('loans.store', [
            // mandamos el item_id para que sea la opcion predeterminada
            'item_id' => Item::find($id),
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Para el checkout_date cogemos la fecha de creacion del prestamo
        $request['checkout_date'] = date('Y-m-d');


        //cogemos el usuario que esta logeado
        $user = auth()->user();
        $request['user_id'] = $user->id;

        //Guarda el prestamo en la base de datos, debemos guardar el nombre del usuario que lo presta, el nombre del item y la fecha de devolucion
        $validatedData = $request->validate([
            'user_id' => 'required',
            'item_id' => 'required',
            'checkout_date' => 'required',
            'due_date' => 'required',
        ]);
        
        Loan::create($validatedData);
        return redirect()->route('loans.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //se le pone al prestamo que se recibe la fecha de retorno y se guarda
        $loan = Loan::find($id);
        $loan->returned_date = date('Y-m-d');
        $loan->save();
        return redirect()->route('loans.index');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loans)
    {
        //
    }
}
