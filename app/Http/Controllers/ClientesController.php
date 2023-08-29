<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Produto;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Scalar\MagicConst\Dir;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function dashboard(){
        $dados = $this->getDados();
        return view('dashboard')->with('dados',$dados);
    }
    
    public function criaTabelaPreco(Request $request){
        
        $dados = $this->getDados();
        
        foreach($dados['clientes'] as $key => $cliente){
            
            if($cliente['doc'] == $request->cliente){
                $tbprecos = [];
                $produtos = $request->produto;
                $values = $request->valor;
                
                for($i = 0; $i < count($values); $i++){
                    $tbprecos[] = [
                        
                        "cd_cliente"=>$request->cliente,
                        "cd_produto"=>$produtos[$i],
                        "pr_venda"=>$values[$i],
                        
                    ];
                    $tbprecos = array_merge($tbprecos);
                }
                // dd($tbprecos);
                $dados['clientes'][$key]['tb_preco'] = array_replace($tbprecos);
            }
        }
        $this->putDados($dados);

        // return redirect("/");
    }

    public function tabelaPreco(){
        $dados = $this->getDados();
        return view('tabelaPrecos')->with('dados',$dados);
    }
    public function index()
    {
        //
        $dados = $this->getDados();
        $clientes = $dados['clientes'];
        return view('clientes')->with('clientes',$clientes);
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
        $novo = [
            
            "tipo" => $request->tipo, 
            "doc" => $request->doc, 
            "desc" => $request->desc,
            "Enderecos" => [
                [
                "endereco" => $request->endereco, 
                "cep" => $request->cep, 
                "tp_end" => $request->tp_end,
                ]
            ],

        ];

        array_push($dados['clientes'],$novo);
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
        $consumo = array_map('str_getcsv',file('../consumo.csv'));
        array_walk($consumo, function(&$a) use ($consumo) {
            $a = array_combine($consumo[0], $a);
        });
        array_shift($consumo);

        $id = $this->formatCnpjCpf($id);
        $dados = $this->getDados();
        $produtos = $dados['produtos'];
        foreach($dados['clientes'] as $cliente){
            if($cliente['doc']==$id){
                return view('clientesDashboard',compact('cliente',$cliente,'produtos',$produtos,'consumo',$consumo));
            }
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
        $id = $this->formatCnpjCpf($id);
        $dados = $this->getDados();
        foreach($dados['clientes'] as $clientes){
            if($clientes['doc']==$id){
                return view('clientesCreate')->with('clientes',$clientes);
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
        foreach($dados['clientes'] as $i => $cliente){
            
            if($cliente['doc'] == $request->doc){

            $a = [
                    "tipo" => $request->tipo, 
                    "doc" => $request->doc, 
                    "desc" => $request->desc, 
                    ];
            $b = [ 
                
                    "endereco" => $request->endereco, 
                    "cep" => $request->cep, 
                    "tp_end" => $request->tp_end,
            ];
            $dados['clientes'][$i] = array_replace($cliente,$a);
            $dados['clientes'][$i]['Enderecos'][0] = array_replace($b);

            
                
            }
        }
        $this->putDados($dados);

        return redirect("/");
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
    
    public function getDados(){
        $dados = json_decode(file_get_contents('../db.json'),true);
        return $dados;
    }
    public function putDados($dados){
        file_put_contents('../db.json',json_encode($dados));
    }
    public function formatCnpjCpf($value)
    {
        $CPF_LENGTH = 11;
        $cnpj_cpf = preg_replace("/\D/", '', $value);
    
    if (strlen($cnpj_cpf) === $CPF_LENGTH) {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
    } 
    
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }
}
