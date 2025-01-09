<?php

namespace App\Http\Controllers;
use App\Models\Tickets;
// use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
// FUNCTION UNTUK SHOW DASHBOARD TIAP DEPT //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        $data = [
            'category_name' => 'apps',
            'page_name' => 'mailbox',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        return view('pages.apps.apps_mailbox')->with($data);
    }

    public function indexAdmin() 
    {
        // $todos = Todo::all();                            // reads everything from table into memory, ::select('SELECT * FROM table') buat milih
        $todos = Tickets::where('dept', '=', 'admin')->get();  // query from table into memory, ::select('SELECT * FROM table WHERE dept = "admin"') buat milih
        $data = ['todos' => $todos];                        // variable $dataAdmin buat penyimpanan dari object todos ke variable $todosAdmin
        return view('todos.indexAdmin', $data);             // nested view directories, masuk ke resource/views/todos/index.blade.php buat ngambil $data dari situ
    }

    public function indexManager() 
    {
        // $todos = Todo::all();                            // reads everything from table into memory, ::select('SELECT * FROM table') buat milih
        $todos = Tickets::where('dept', '=', 'manager')->get(); // query from table into memory, ::select('SELECT * FROM table WHERE dept = "admin"') buat milih
        $data = ['todos' => $todos];                        // variable $dataAdmin buat penyimpanan dari object todos ke variable $todosAdmin
        return view('todos.indexManager', $data);           // nested view directories, masuk ke resource/views/todos/index.blade.php buat ngambil $data dari situ
    }

    public function indexUser() 
    {
        // $todos = Todo::all();                            // reads everything from table into memory, ::select('SELECT * FROM table') buat milih
        $todos = Tickets::where('dept', '=', 'user')->get();   // query from table into memory, ::select('SELECT * FROM table WHERE dept = "admin"') buat milih
        $data = ['todos' => $todos];                        // variable $dataAdmin buat penyimpanan dari object todos ke variable $todosAdmin
        return view('todos.indexUser', $data);              // nested view directories, masuk ke resource/views/todos/index.blade.php buat ngambil $data dari situ
    }


// FUNCTION UNTUK SHOW REQUESTED TIAP DEPT //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function requestedAdmin()
    {
        $request = Tickets::where('requestor_dept', '=', 'admin')->get();
        $ReqData = ['request' => $request];
        return view('todos.requested', $ReqData);
    }

    public function requestedUser()
    {
        $request = Tickets::where('requestor_dept', '=', 'user')->get();
        $ReqData = ['request' => $request];
        return view('todos.requestedUser', $ReqData);
    }

    public function requestedManager()
    {
        $request = Tickets::where('requestor_dept', '=', 'manager')->get();
        $ReqData = ['request' => $request];
        return view('todos.requestedManager', $ReqData);
    }


// FUNCTION UNTUK CREATE TODOS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    

    public function create()
    {
        $userName = Auth::user()->name;
        // $userDept = Auth::user()->dept;
        $data = [
            'category_name' => 'apps',
            'page_name' => 'mailbox',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        return view('tickets.create', [
            'requestor' => $userName,
            // 'requestor_dept' => $userDept,
        ])->with($data);
    }

    public function createManager()
    {
        $userName = Auth::user()->name;
        $userDept = Auth::user()->dept;
        return view('todos.createManager', [
            'userNameData' => $userName,
            'userDeptData' => $userDept,
        ]);
    }

    public function createUser()
    {
        $userName = Auth::user()->name;
        $userDept = Auth::user()->dept;
        return view('todos.createUser', [
            'userNameData' => $userName,
            'userDeptData' => $userDept,
        ]);
    }

// INI BUAT LAIN-LAIN //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    

    public function store(Request $request)
    {
        Tickets::create($request->all());       // Todo manggil METHOD ::create($request dimasukkan ke all())
        $data = [
            'category_name' => 'apps',
            'page_name' => 'mailbox',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        return redirect('/apps/mailbox')->with($data);                // ngembaliin ke routes/web.php ('/')
    }

    public function edit(Tickets $todo)
    {
        return view('todos.edit', compact('todo'));     // nested view directories, masuk ke resource/views/todos/edit.blade.php buat ngambil $data dari situ 
    }                                                   // compact buat bikin array dari variable dan valuenya

    public function update(Request $request, Tickets $todo)
    {
        $todo->update($request->all());
        return redirect('/');
    }

    public function delete(Tickets $todo)
    {
        $todo->delete();
        return redirect('/');
    }

    // public function userID()
    // {
    //     $userID = Auth::id();
    //     $dataID = ['useID' => $userID];
    //     return view('todos.create', $dataID);
    // }
}
