<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

// php artisan make:controller TaskController --resource --model=Task ---> con este commando podemos crear un controlador y un modelo al mismo tiempo, añadiendo flags, con el flag --resource el controlador se crea con el el esqueleto basico de metodos para un CRUD

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::latest()->paginate(3);
        return view('index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    //El metodo create se utiliza para mostrar el formulario
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    //El metodo store se utiliza para ejecutar la logica para almacenar el nuevo registro con los datos provenientes de formulario
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        Task::create($request->all());
        //with variable de secion
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        return view('edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada exitosamente');
    }
}
