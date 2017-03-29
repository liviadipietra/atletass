<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use Auth;
use Validator;

use App\Evento;
use App\Registro;
use App\User;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth', ['except' => 'index']);
    }

    public function index(){
      $eventos = Evento::orderBy('data', 'asc')->get();

      return view('home', [
          'eventos' => $eventos
      ]);
    }

    public function registros(){
      $registros = Registro::orderBy('data', 'desc')->get();

      return view('registros', [
          'registros' => $registros
      ]);
    }

    public function atletas(){
      $atletas = User::orderBy('nome', 'asc')->get();

      return view('atletas', [
          'atletas' => $atletas
      ]);
    }

    public function totalregistros(){
      $atletas = User::orderBy('nome', 'asc')->get();
      $eventos = Evento::orderBy('data', 'desc')->get();

      return view('totalregistros', [
          'atletas' => $atletas,
          'eventos' => $eventos
      ]);
    }

    public function meusEventos(){
      $registros = Auth::user()->registros;

      return view('meuseventos', [
          'registros' => $registros
      ]);
    }

    public function registrar(){
      $eventos = Evento::orderBy('nome', 'asc')->get();
      $tempEventos = [];
      foreach($eventos as $evt){
        $tempEventos[$evt->id] = $evt->nome;
      }
      $pago = [0=>"Não", 1=>"Sim"];
      $registro = new Registro;
      return view('registrar',[
        'eventos' => $tempEventos,
        'pago' => $pago,
        'registro' => $registro
      ]);
    }

    public function saveRegistro(Request $request){
      $registro = Registro::find($request->registroId);
      if($registro == null) $registro = new Registro;
        $fields = [
            'evento' => 'required|numeric',
            'pago' => 'required|numeric',
            'data' => 'required|date'
        ];

        $validator = Validator::make($request->all(), $fields, [
          'required' => 'O campo :attribute é obrigatório.',
          'max' => 'O campo :attribute deve possuir no máximo :max caracteres.',
          'min' => 'O campo :attribute deve possuir no mínimo :min caracteres.',
          'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
          'date' => 'O campo :attribute deve ser uma data válida.',
          'image' => 'Selecione uma imagem válida.',
        ]);

      if ($validator->fails()) {
        return redirect('/registrar')
            ->withInput()
            ->withErrors($validator);
      }

      $registro->evento_id = $request->evento;
      $registro->atleta_id = Auth::user()->id;
      $registro->data = $request->data;
      $registro->pago = (int)$request->pago;

      $registro->save();

      Session::flash('status_success', 'Registro efetuado com sucesso!');

      return redirect('/meusEventos');
    }
}
