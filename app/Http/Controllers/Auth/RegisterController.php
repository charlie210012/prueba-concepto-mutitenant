<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Stancl\Tenancy\Resolvers\DomainTenantResolver;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $tenantName = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        // $hostname = tenant('id');
        // if($hostname){
        //     $this->tenantName = $hostname;
        // }
        $this->middleware('guest');
    }

    // public function showRegistrationForm()
    // {
    //     return view('auth.register')->with('tenantName',$this->tenantName);
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $domain = sprintf('%s.%s', $data['hostname'],env('APP_DOMAIN'));
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'domain' => ['requered','string','min:20', Rule::unique('domains')->where(function($query) use ($domain){
                return $query->where('domain',$domain);
            })]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        $domain = sprintf('%s.%s', $request['hostname'],env('APP_DOMAIN'));
        $dir = sprintf('%s.%s', $request['hostname'],env('APP_DIR'));
        $tenant = Tenant::create(['id'=> $request['hostname']]);
        $tenant->domains()->create(['domain'=>$domain]);
        $this->createHost($domain,$dir);
    }

    protected function createHost($domain,$dir)
    {

        $fh = fopen("C:/laragon/etc/apache2/sites-enabled/".$domain.".conf", 'w') or die("Se produjo un error al crear el archivo");
        
        $texto = <<<_END
        <VirtualHost *:80> 
            DocumentRoot "C:/laragon/www/plataforma-impuesto/public/"
            ServerName $domain
            ServerAlias *.$domain
            <Directory "C:/laragon/www/plataforma-impuesto/public/">
                AllowOverride All
                Require all granted
            </Directory>
        </VirtualHost>
        _END;
        
        fwrite($fh, $texto) or die("No se pudo escribir en el archivo");
        
        fclose($fh);

        mkdir("C:\laragon\www/$dir");

        exec("C:\laragon\laragon reload apache");
        exec("start http://".$domain);
    }
}