<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $allTasks = Todo::all();
        return response()->json($allTasks, 200);
    }

    public function getList(string $id)
    {
        $task = Todo::where('id', $id)->first();
        if (empty($task)) {
            return response()->json(['message' => 'A lista nao foi encontrada!'], 404);
        }

        return response()->json($task, 200);
    }

    public function store(Request $request)
    {
        if (empty($request->title)) {
            return response()->json(['message' => 'A propriedade title e obrigatoria'], 422);
        }

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->done = $request->done;
        $todo->save();

        return response()->json(['message' => 'Lista criada com sucesso'], 201);
    }

    public function update(Request $request, string $id)
    {
        $todo = Todo::where('id', $id)->first();

        if (empty($todo)) {
            return response()->json(['message' => 'A lista nao foi encontrada'], 404);
        }

        if (empty($request->title)) {
            return response()->json(['message' => 'A propriedade title e obrigatoria'], 422);
        }

        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->done = $request->done;
        $todo->update();

        return response()->json(['message' => 'Lista atualizada com sucesso'], 201);
    }

    public function destroy(string $id)
    {
        if (empty($id)) {
            return response()->json(['message' => 'Nenhum ID foi passado!'], 400);
        }

        $task = Todo::where('id', $id)->first();
        if (empty($task)) {
            return response()->json(['message' => 'A lista nao foi encontrada!'], 404);
        }

        $task->delete();
        return response()->json(['message' => 'A lista foi deletada com sucesso!'], 200);

    }
}
