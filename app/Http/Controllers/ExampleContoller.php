<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function viewAdoptante()
    {
        return view('ExampleViews.viewAdoptante'); // Asegúrate de tener esta vista en resources/views/example/adoptante.blade.php
    }

    public function viewRefugio()
    {
        return view('ExampleViews.viewRefugio'); // Crea la vista correspondiente
    }

    public function viewNatural()
    {
        return view('ExampleViews.viewNatural'); // Crea la vista correspondiente
    }

    public function viewAdmin()
    {
        return view('ExampleViews.viewAdmin'); // Crea la vista correspondiente
    }
}
