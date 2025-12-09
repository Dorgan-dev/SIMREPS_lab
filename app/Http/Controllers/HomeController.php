<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Console;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::latest()->limit(3)->get();
        return view('guest.index', compact('rooms'));
    }

    public function rooms()
    {
        $rooms = Room::latest()->get(); // SEMUA DATA
        return view('guest.rooms', compact('rooms'));
    }

    public function about()
    {
        return view('guest.about');
    }

    public function contact()
    {
        return view('guest.contact');
    }

    public function login()
    {
        return view('guest.login');
    }

    public function register()
    {
        return view('guest.register');
    }

    public function console(Request $request)
    {
        $filterableColumns = ['kategori'];

        $consoles = Console::filter($request, $filterableColumns)
            ->with('images')
            ->paginate(8)
            ->withQueryString();

        return view('guest.console', compact('consoles'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::with(['images', 'consoles'])->findOrFail($id);
        return view('guest.room-detail', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
