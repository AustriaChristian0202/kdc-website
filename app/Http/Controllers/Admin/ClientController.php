<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
  //
  public function index(Request $request)
  {

    $request->validate(
      [
        'search' => 'nullable|string',
      ]
    );

    $clients = User::where('role', 'client')
      ->when($request->search, function ($query, $search) {
        $query->where('name', 'like', "%$search%");
      })
      ->paginate(10)->appends($request->all());


    return Inertia::render('Admin/Client/Index', [
      'clients' => $clients,
      'filters' => $request->all()
    ]);
  }

  public function destroy($id)
  {
    $client = User::find($id);
    $client->delete();

    return redirect()->back()->with([
      'message' => [
        'type' => 'success',
        'content' => 'Client deleted successfully'
      ]
    ]);
  }
}
