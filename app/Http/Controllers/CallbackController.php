<?php

namespace App\Http\Controllers;

use App\Models\Callback;
use Illuminate\Http\Request;
use App\Mail\NewCallbackMail;
use Illuminate\Support\Facades\Mail;

class CallbackController extends Controller
{
    public function index()
    {
        try {
            $callbacks = Callback::all();
            if ($callbacks->isEmpty()) {
                return response()->json(['message' => 'Il n\'y aucune demande de rappel pour le moment'], 404);
            }
            return response()->json($callbacks);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la recherche des demandes de rappel'], 500);
        }
    }

    public function show($id)
    {
        try {
            $callback = Callback::findOrFail($id);
            return response()->json($callback);
        } catch (\Exception $e) {
            return response()->json(['message' => 'La demande de rappel est introuvable'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'contact_name' => 'required|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string',
            'message' => 'nullable|string',
            'available_morning' => 'required|boolean',
            'available_daytime' => 'required|boolean',
            'available_evening' => 'required|boolean',
        ]);

        try {
            // Enregistrement du nouveau callback dans la bd
            $callback = Callback::create($request->all());

            // Envoi du e-mail de notification
            Mail::to('yvanblanchette@outlook.com')->send(new NewCallbackMail($callback));

            // Retour de la demande de rappel
            return response()->json(['message' => 'Demande de rappel enregistrée avec succès'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de l\'enregistrement de la demande de rappel'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $callback = Callback::findOrFail($id);
            $callback->update($request->all());
            return response()->json(['message' => 'Demande de rappel modifiée avec succès', 'data' => $callback], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la modification de la demande de rappel'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $callback = Callback::findOrFail($id);
            $callback->delete();
            return response()->json(['message' => 'Demande de rappel supprimée avec succès'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la suppression de la demande de rappel'], 500);
        }
    }
}
