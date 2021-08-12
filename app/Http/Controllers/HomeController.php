<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\categorias;
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
        
        $this->objcat = new categorias();  //AQUI TORNA A MODEL EM OBJETO, FICA MAIS FACIL MANIPULAR
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
        
        
        $dados = $categoria->dados()->get();

        return response ()->json( //ENVIANDO OS VALORS JSON PARA O JQUERY (REDE DO INSPECIONAR)
            $dados
        );
        
        
    }


    
    public function conluidoDW(Request $request)
    {

        // CONSIGO FAZER O SAVE NO BANCO A CADA CLIQUI NO DOWNLOAD, POREM VAI SALVANDO COMO CADA ITEM NOVO.
        $input = $request->all();

        $dwc =  Produto::where('id', 1)->get()->first(); // AQUI EU PUXO OS DADOS DO BANCO   // AQUI POSSO PASSAR O CAMINHO DA MODEL PRODUTO E A TABELA DOWNLAODS DE LÁ, ESPECIFICANDO CADA ITEM ATRAVEZ DE SEU ID, PARA ISSO, PRECISO DO ID OU NOME DO ITEM PARA DOWNLOADS;
        
        echo $dwc;

        $value = $dwc->downloads += 1; // AQUI ACESSO O ITEM DA TABELA E FAÇO INCREMENTO

        $v=Produto::where('id',1)->update(['downloads'=> $value]); // AQUI PASSO O COMANDO DE UPDATE PARA O BANCO
        
        echo $v;


        //PRECISO PASSAR O ID OU NOME DA CATEGORIA DO ITEM NA ROTA JQUERY, PARA O LARAVEL SABER DE QUAL ITEM SE TRATA. PARA ISSO PRECISO PASSAR NA ROTA 

        //PASSAR O INPUT QUE VEM DA FRONT, PARA SER AUTOMATICO A SELEÇÃO DE QUAL DOWNLOADS VAI CONTAR.
    }



}
