<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Item;
use App\Models\User;
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

        //pasamos una variable que guarde el nombre del item que coincida con item_id
        $item = Item::find($request['item_id']);
        
        //Le pasamos los users y los items a la vista
        Loan::create($validatedData)::with('user', 'item')->get();
        return redirect()->route('loans.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //Pasamos nombre de usuario, nombre de item y el loan entero a la vista
        return view('loans.show', [
            'loan' => Loan::find($id),
            'user' => User::find(Loan::find($id)->user_id),
            'item' => Item::find(Loan::find($id)->item_id)
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //Pasamos el loan a la vista
        return view('loans.edit', [
            'loan' => Loan::find($id),
            'items' => Item::all(),
            'item_id' => Item::find(Loan::find($id)->item_id)

        ]);
        
    }

    public function return(String $id)
    {
        //se le pone al prestamo que se recibe la fecha de retorno y se guarda
        $loan = Loan::find($id);
        $loan->returned_date = date('Y-m-d');
        $loan->save();
        //Se redirige a la vista index con el loan y el usuario que lo ha devuelto
        return view('loans.index', [
            'loans' => Loan::all(),
            'user' => User::find(Loan::find($id)->user_id),
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        //Actualiza el prestamo con los datos que se le pasan
        $loan = Loan::find($id);
        $loan->update($request->all());
        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loans)
    {
        //
    }
}
