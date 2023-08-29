<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
      
     public function index()
    {
        //
        $res = $this->getDados();
        return view('produtos')->with('res',$res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $dados = $this->getDados();
        $novo =
                [
                    "desc"=> $request->desc,
                    "codigo"=> $request->codigo,
                    "custo"=> $request->custo,
                    "vr_margem"=> $request->vr_margem,
                ];
        array_push($dados['produtos'],$novo);
        $this->putDados($dados);

        return redirect("/");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $dados = $this->getDados();
        foreach($dados['produtos'] as $produto){
            if($produto['codigo']==$id)
            return redirect('/');
        }
        return null;
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
        $dados = $this->getDados();
        foreach($dados['produtos'] as $produto){
            if($produto['codigo']==$id){
                return view('produtosCreate')->with('produto',$produto);
            }
        }
        return null;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $dados= $this->getDados();
        foreach($dados['produtos'] as $i => $produto){
            
            if($produto['codigo'] == $request->codigo){

            $atualiza = [
                
                    "desc"=> $request->desc,
                    "codigo"=> $request->codigo,
                    "custo"=> $request->custo,
                    "vr_margem"=> $request->vr_margem,
                
                ];
            $dados['produtos'][$i] = array_replace($produto,$atualiza);               
            }
        }
        $this->putDados($dados);

        return redirect("/produtos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function putDados($dados){
        file_put_contents('../db.json',json_encode($dados));
        return true;
    }
    Private function getDados(){
        return json_decode(file_get_contents('../db.json'),true);
    }
    
}
