<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use Illuminate\Http\Request;
use App\Http\Resources\AlunoResource;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Alunos::all();
        return $alunos;
    }

    public function indexJoin()
    {
        $alunos = Alunos::join('cursos','alunos.curso_id','=','cursos.id')
        ->select('alunos.id','nome','email','data_nascimento','cursos.titulo as curso', 'cursos.descricao as descricao_curso')->get();
        return $alunos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alunos = new Alunos;
        $alunos->nome = $request->input('nome');
        $alunos->email = $request->input('email');
        $alunos->data_nascimento = $request->input('data_nascimento');
        $alunos->curso_id = $request->input('curso_id');
    

    
        if( $alunos->save() ){
          return new AlunoResource( $alunos );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $alunos = Alunos::findOrFail($request->id);
        return new AlunoResource($alunos);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alunos = Alunos::findOrFail($request->id);
        $alunos->nome = $request->input('nome');
        $alunos->email = $request->input('email');
        $alunos->data_nascimento = $request->input('data_nascimento');
        $alunos->curso_id = $request->input('curso_id');
    

    
        if( $alunos->save() ){
          return new AlunoResource( $alunos );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $alunos = Alunos::findOrFail($request->id);
        if ($alunos->delete()){
            return new AlunoResource($alunos);
        }
    }
}
