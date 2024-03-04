<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Loan;

use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('items.index', [
            'items' => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('items.store', [
            'boxes' => Box::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id',
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public/photos');
            $validated['picture'] = $path;
        } elseif ($request->has('url_picture')) {
            // Obtener la URL de la picture desde la solicitud
            $url = $request->input('url_picture');

            // Validar si la URL es válida (puedes agregar más validaciones según tus necesidades)
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                // Asignar la URL como la picture
                $validated['picture'] = $url;
            } else {
                // En caso de que la URL no sea válida, asignar la picture base.jpg local
                $validated['picture'] = null;
            }
        } else {
            // Si no se proporciona ni un archivo ni una URL, asignar la picture null
            $validated['picture'] = null;
        }
        
        Item::create($validated);

        return redirect(route('items.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item): View
    {
        return view('items.show', [
            'item' => $item,
            'loans' => Loan::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id): View
    {
        // $this->authorize('update', $item);

        return view('items.edit', [
            'item' => Item::find($id),
            'boxes' => Box::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        // $this->authorize('update', $item);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'price' => 'nullable|numeric',
            'box_id' => 'nullable|exists:boxes,id',
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public/photos');
            $validated['picture'] = $path;
        } elseif ($request->has('url_picture')) {
            // Obtener la URL de la picture desde la solicitud
            $url = $request->input('url_picture');

            // Validar si la URL es válida (puedes agregar más validaciones según tus necesidades)
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                // Asignar la URL como la picture
                $validated['picture'] = $url;
            } else {
                // En caso de que la URL no sea válida, asignar la picture base.jpg local
                $validated['picture'] = null;
            }
        } else {
            // Si no se proporciona ni un archivo ni una URL, asignar la picture null
            $validated['picture'] = null;
        }

        $item = Item::find($id);
        $item->update($validated);

        return redirect(route('items.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Item::destroy($id);

        return redirect(route('items.index'));
    }
}
