<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\PerrosController;
use App\Http\Controllers\SeguimientoVisitasController;
use App\Http\Controllers\ViabilidadEstudiosController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\PerrosDisponiblesController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\SolicitudAdopcionController;
use App\Http\Controllers\ViabilidadEstudioVistaController;
use App\Http\Controllers\SeguimientoVisitasVistaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController as ControllersLoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;


//Ruta ejemplo
use App\Http\Controllers\ExampleController;


// Página de inicio


Route::get('/', function () {
    return view('welcome');
})->name('welcome');



// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/redirect', function () {
    if (Auth::check()) {
        return match (Auth::user()->id_rol) {
            1 => redirect()->route('welcome.adoptante'),
            2=> redirect()->route('welcome.refugio'),
            3 => redirect()->route('welcome.refugio'),
            4=> redirect()->route('welcome.admin'),
            default => dd('Rol desconocido: ' . Auth::user()->id_rol),
        };
        
    }
    return view('auth.login');
})->middleware('auth');

//Ingresar comno admin
//Route::get('/login-prueba', function () {
   // $user = \App\Models\User::where('email', 'admin@example.com')->first();
    //Auth::login($user);
//});



// logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Rutas de Registro
Route::get('/register/adoptante', [RegisterController::class, 'showAdop'])->name('register.adoptante');
Route::get('/register/natural', [RegisterController::class, 'showpNatural'])->name('register.natural');
Route::get('/register/refugio', [RegisterController::class, 'showRefugio'])->name('register.refugio');

Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// Rutas Ejemplo
Route::get('/adoptante', [ExampleController::class, 'viewAdoptante'])->name('Example.viewAdoptante');
Route::get('/refugio', [ExampleController::class, 'viewRefugio'])->name('Example.viewRefugio');
Route::get('/natural', [ExampleController::class, 'viewNatural'])->name('Example.viewNatural');
Route::get('/admin', [ExampleController::class, 'viewAdmin'])->name('Example.viewAdmin');







// Rutas de Perros Disponibles
Route::get('/perrosdisponibles', [PerrosDisponiblesController::class, 'mostrar'])->name('perrosdisponibles');

// Solicitud de adopción
Route::post('/solicitud-adopcion', [SolicitudAdopcionController::class, 'store'])->name('solicitud.adopcion');



// Rutas CRUD para roles (maneja adoptantes y refugios)
Route::resource('roles', RoleController::class);
Route::get('/roles', function () {
    return view('roles');
})->name('roles');

// Rutas para Perros
Route::get('/Perros', [PerrosController::class, 'index'])->name('Perros.index');
Route::get('/Perros/create', [PerrosController::class, 'create'])->name('Perros.create');
Route::post('/Perros/store', [PerrosController::class, 'store'])->name('Perros.store');
Route::resource('Perros', PerrosController::class);


// Rutas para Seguimiento de Visitas y Viabilidad de Estudios
Route::resource('SeguimientoVisitas', SeguimientoVisitasController::class);
Route::resource('ViabilidadEstudios', ViabilidadEstudiosController::class);


// Cuidados
Route::view('/cuidados', 'cuidados')->name('cuidados');

// Administración (solo administradores)
Route::view('/administracion', 'administracion')->name('administracion');

//vistas de los login despues de inicar sesion

Route::get('/vistaadoptante', function () {
    return view('vistaadoptante');
})->name('vistaadoptante');

Route::get('/vistarefugio', function () {
    return view('vistarefugio');
})->name('vistarefugio');

Route::get('/vistaadmin', function () {
    return view('vistaadmin');
})->name('vistaadmin');




// Perfil del Adoptante (solo adoptantes)
//Route::middleware(['auth', 'role:adoptante'])->group(function () {
    Route::get('/perfil', [RoleController::class, 'perfilAdoptante'])->name('perfil');
    Route::post('/perfil/actualizar', [RoleController::class, 'actualizarPerfilAdoptante'])->name('perfil.actualizar');
//});

// Login de Refugios y Perfil (solo refugios)
//Route::middleware(['auth', 'role:refugio'])->group(function () {
    Route::view('/loginrefugio', 'loginrefugio')->name('loginrefugio');
    Route::post('/loginrefugio', [LoginController::class, 'RefugioLogin'])->name('refugio.login');
    Route::get('/perfilrefugio', [RoleController::class, 'perfilRefugio'])->name('perfilrefugio');
    Route::post('/perfilrefugio/actualizar', [RoleController::class, 'actualizarPerfilRefugio'])->name('perfilrefugio.actualizar');
//});

// Registro de Perros (solo refugios y administradores)
//Route::middleware(['auth', 'role:refugio,administrador'])->group(function () {
    Route::get('/registroperros', [PerrosController::class, 'create'])->name('perros.create');
    Route::post('/registroperros', [PerrosController::class, 'store'])->name('perros.store');
    
//});

Route::get('/registroperros1', [PerrosController::class, 'create'])->name('registroperros1');

// Rutas para la vista de Viabilidad de Estudios y Seguimiento de Visitas
Route::prefix('viabilidadestudiovista')->middleware(['auth', 'role:administrador'])->group(function () {
    Route::get('/', [ViabilidadEstudioVistaController::class, 'mostrar'])->name('viabilidadestudiovista.mostrar');
    Route::post('/subir', [ViabilidadEstudioVistaController::class, 'subir'])->name('viabilidadestudiovista.subir');
});

//seguimento vistas VISTAAAAAAAAAA
Route::resource('SeguimientoVisitas', SeguimientoVisitasController::class);

Route::prefix('seguimientovisitasvista')->group(function () {
    Route::get('/', [SeguimientoVisitasVistaController::class, 'mostrar'])->name('seguimientovisitasvista.mostrar');
    Route::post('/subir', [SeguimientoVisitasVistaController::class, 'subir'])->name('seguimientovisitasvista.subir');
});

Route::resource('ViabilidadEstudios', ViabilidadEstudiosController::class);

Route::prefix('viabilidadestudiovista')->group(function () {
    Route::get('/', [ViabilidadEstudioVistaController::class, 'mostrar'])->name('viabilidadestudiovista.mostrar');
    Route::post('/subir', [ViabilidadEstudioVistaController::class, 'subir'])->name('viabilidadestudiovista.subir');
});



Route::get('/welcomep', function () {
    return view('welcomep');
})->name('welcomep');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//ruta de users tabla administracion//
Route::resource('Users', UserController::class);


// Página de estadísticas (solo vista pública)
Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas');

// Página principal con estadísticas
Route::get('/welcome', [EstadisticasController::class, 'metodo'])->name('welcome');