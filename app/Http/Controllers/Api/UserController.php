<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;

/*Los modelos que se necesitan para el UserController*/
use App\Models\User;
use App\Models\Users\Profile;

class UserController extends Controller
{
    //registro de usuario.
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'            
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de usuario exitoso!",
        ]);    
    }

    //para hacer el login de usuario 
    public function login(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        $user = User::where("email", "=", $request->email)->first();
        if( isset($user->id) ){
            if(Hash::check($request->password, $user->password)){
                //creamos el token
                $token = $user->createToken("auth_token")->plainTextToken;
                //si está todo ok
                return response()->json([
                    "status" => 1,
                    "user" => "name",
                    "msg" => "¡Usuario logueado exitosamente!",
                    "access_token" => $token
                ]);        
            }else{
                return response()->json([
                    "status" => 0,
                    "msg" => "La password es incorrecta",
                ], 404);    
            }

        }else{
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no registrado",
            ], 404);  
        }
    }

     //salir de la sesión
    public function logout() {
        auth()->user()->tokens()->delete();

        return response()->json([
            "status" => 1,
            "msg" => "Cierre de Sesión",            
        ]); 
    }

    //Obtiene el perfil del usuario de existir
    //perfiles de usuario:
    public function getPerfil() {
        return response()->json([
            /*"status" => 0,
            "msg" => "Acerca del perfil de usuario",
            "data" => auth()->user()*/
            auth()->user()
        ]); 
    }

    //subir perfil en forma de json 
    public function crearPerfil(Request $request) {
        $request->validate([
            'nombres' => "required|unique:profiles",
            'primer_apellido' => "required",
            'segundo_apellido'=> "required",
            'genero'=> "required",
            'RFC'=> "required|unique:profiles",
            'NSS'=> "required|unique:profiles",
            'CURP'=> "required|unique:profiles",
            'telefono'=> "required|unique:profiles",
            'calle'=> "required",
            'numero'=> "required|min:11|numeric",
            'colonia'=> "required",
            'ciudad'=> "required",
            'estado'=> "required",
            'pais'=> "required",
            'CP'=> "required",

            //Natalidad 
           'fecha_nacimiento'=>"required",
           'ciudad_nacimiento'=>"required",
           'estado_nacimiento'=>"required",
           'pais_nacimiento'=>"required"
        ]);

        $user_id = auth()->user()->id;

        // $perfil = new Profile();
        // $perfil->user_id = $user_id;
        // $request->all()

        $perfil = Profile::create($request->all());
        $perfil->user_id = $user_id;

    }

    public function editarPerfil(){
        $request->validate([
            'nombres' => "required|unique:profiles",
            'primer_apellido' => "required",
            'segundo_apellido'=> "required",
            'genero'=> "required",
            'RFC'=> "required|unique:profiles",
            'NSS'=> "required|unique:profiles",
            'CURP'=> "required|unique:profiles",
            'telefono'=> "required|unique:profiles",
            'calle'=> "required",
            'numero'=> "required|min:11|numeric",
            'colonia'=> "required",
            'ciudad'=> "required",
            'estado'=> "required",
            'pais'=> "required",
            'CP'=> "required",

            //Natalidad 
           'fecha_nacimiento'=>"required",
           'ciudad_nacimiento'=>"required",
           'estado_nacimiento'=>"required",
           'pais_nacimiento'=>"required"
        ]);


    }

    public function reportesDeEstandares(){

    }
    public function reporteDeEstandar(){

    }
    public function getEstandares(){

    }
    public function pedirEstandar(){

    }
    public function getConocimiento(){

    }

}