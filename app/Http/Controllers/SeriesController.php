<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::get();
        
        $mensagem = $request->session()->get('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(request $request)
    {
        $dados = $request->except("_token");
        $series = Serie::create(['nome' => $request->nome]);

        //loop na quantidade de temporada
        $qtdtemporadas = $request->qtd_temporadas;
        for($i = 1; $i <= $qtdtemporadas; $i++){
          //grava o numero do indice na tabela temporada
          $temporada = $series->temporadas()->create(['numero' => $i]);
          //cria o segundo loop dentro do primero grava o episodio
            for($i = 1; $i <= $request->ep_por_temporada; $i++){
                $temporada->episodio()->create(['numero' => $i]);
            }
        }

        $request->session()->flash('mensagem', "Série {$series->id} cirada com sucesso {$series->nome}");

        return redirect()->route('list_series');
    }
    
    public function destroy(Request $request)
    {
        Serie::destroy($request->id);

        $request->session()->flash('mensagem', 'Série removida com sucesso.');
        return redirect('/series');
    }
}
