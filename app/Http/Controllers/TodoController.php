<?php
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Auth::user()->todos;
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate(['task' => 'required|string|max:255']);

        Auth::user()->todos()->create($request->all());
        return redirect()->route('todos.index');
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update(['completed' => $request->has('completed')]);
        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }
}
