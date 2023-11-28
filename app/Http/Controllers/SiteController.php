<?php

namespace App\Http\Controllers;

use App\Models\aluno;
use App\Models\curso;

use Illuminate\Http\Request;


class SiteController extends Controller
{

    private $alunos;
    private $cursos;

    public function __construct(aluno $aluno, curso $curso)
    {
        $this->alunos = $aluno;
        $this->cursos = $curso;
    }


    public function index()
    {

        $cursos = $this->cursos->all();
        $alunos = $this->alunos->all();
        return view('site.index', compact('alunos', 'cursos'));
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
