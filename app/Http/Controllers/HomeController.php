<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorias;
use App\Models\subcategorias;
use App\Models\Produto;
class HomeController extends Controller
{

    private $objcat;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   

        $this->objsub = new subcategorias();
        $this->objcat = new categorias();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    


    public function categoria(Request $request)     //PUXAR OS DADOS DA CATEGORIA PRINCIPAL
    {   
        // $user = $request->categorias; // returns an instance of the authenticated user...
        // $id = $request->user()->id;
        // dd($id);
        // $id = categorias::all();
        // $catt = categorias::find($id);
        // dd($catt);
        // $sub = $catt->idcat;
        // dd($sub);



        $cat = $this->objcat->where('idcategoria', 0)->get();
        
        return view('welcome',compact('cat'));
    }

    


    public function conscategoria(Request $request) //Puxa os dados da subcategoria
    {
        // $car = 'sda';
        $input = $request->all();
        
        $sub = $this->objcat->where('idcategoria', $input['id'])->get();
        
        return response()->json(
            $sub
        );

    
    }


    public function produto(){ //Puxar os dados da categoria principal no ato de subir para o banco
        
        $cat = $this->objcat->where('idcategoria', 0)->get();
        
        return view('produto',compact('cat'));
        
    }


    public function cadastroproduto(Request $request)    // Cadastro dos itens para o banco
    {   
        // $prd = Produto::all();
        // dd($prd);

        $extension = $request->file('file_path')->getClientOriginalExtension();
       
        $fileNameTostore = md5(date('Y-m-d H:i:s')).'.'.$extension;
        $foto = $request->file('file_path')->storeAS('public/',$fileNameTostore);
    
        $produto = Produto::create([
            'nome' => $request -> nome,
            'textoarea'=> $request -> textoarea,
            'categoria_id'=> $request -> categoria_id,
            'file_path'=> $fileNameTostore,

        ]);
        
        return redirect()->back();
    }



    public function ontetomany(Request $request)
    {   

        $input = $request->all();
        $categoria = categorias::where('categoria',$input['categoria'])->get()->first(); //PASSANDO OS PARAMETROS DE BUSCA PARA PUXAR DO BANCO
        
        echo $categoria->categoria;
        $dados = $categoria->dados()->get();

        return response ()->json(
            $dados
        );



        // foreach($categoria as $categoria){ //QUANDO SE TRATA DE VARIOS VALORES, PRECISAMOS DAR UM LOOP PARA NÃO DA ERRO
            
        //     echo "<b>$categoria->categoria</b>"; //ITENS NA COLUNA CATEGORIA

        //     $dados = $categoria->dados()->get(); //CHAMANDO FUNÇÃO COMO METODO DA MODEL CATEGORIA


        //     foreach($dados as $dados){ //LOOP PARA CHAMAR OS NOMES DOS INTENS NA TABELA PRODUTO
        //         echo "<br>{$dados->nome}";
        //     }
        
        //     echo "<hr>";
        // }
        
        
    }


}