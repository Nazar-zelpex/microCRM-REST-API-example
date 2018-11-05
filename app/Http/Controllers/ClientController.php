<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

/**
 * Class ClientController
 *
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{
    /**
     * Show client using ID or all clients
     *
     * @param null $id
     *
     * @return Client[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show($id = null)
    {
        return isset($id) ? Client::findOrFail($id) : Client::all();
    }

    /**
     * Create new client account
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json(Client::create($request->all()), 201);
    }

    /**
     * Delete client account using ID
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json(null, 204);
    }
}
