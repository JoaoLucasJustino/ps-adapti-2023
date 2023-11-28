<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\cursoRequest;
use App\Models\curso;
use App\Models\Categoria;

class CursoController extends Controller
{

    private $cursos;

    public function __construct(curso $curso)
    {
        $this->cursos = $curso;
    }

    public function index()
    {
        $cursos = $this->cursos->all();
        return view('admin.curso.index', compact('cursos'));
    }


    public function create()
    {
        return view('admin.curso.crud');
    }


    public function store(cursoRequest $request)
    {
        $data =$request->all();
        $this->cursos->create($data);
        return redirect()->route('curso.index')-> with('success', 'Curso cadastrado com sucesso.');
    }

    public function edit($id)
    {
        $curso = $this->cursos->find($id);
        return view('admin.curso.crud', compact('curso'));
    }

    public function update(cursoRequest $request, $id)
    {
        $data =$request->all(); 
        $curso = $this->cursos->find($id);
        $curso->update($data);
        return redirect()->route('curso.index')-> with('success', 'Curso atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $curso = $this->cursos->find($id);
        $curso->delete();
        return redirect()->route('curso.index')-> with('success', 'Curso exluido com sucesso.');
    }
}
