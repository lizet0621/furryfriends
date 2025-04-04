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

// Página de inicio


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

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

// Rutas para Seguimiento de Visitas y Viabilidad de Estudios
Route::resource('SeguimientoVisitas', SeguimientoVisitasController::class);
Route::resource('ViabilidadEstudios', ViabilidadEstudiosController::class);

// Cuidados
Route::view('/cuidados', 'cuidados')->name('cuidados');

// Administración (solo administradores)
Route::view('/administracion', 'administracion')->name('administracion');

// Perfil del Adoptante (solo adoptantes)
Route::middleware(['auth', 'role:adoptante'])->group(function () {
    Route::get('/perfil', [RoleController::class, 'perfilAdoptante'])->name('perfil');
    Route::post('/perfil/actualizar', [RoleController::class, 'actualizarPerfilAdoptante'])->name('perfil.actualizar');
});

// Login de Refugios y Perfil (solo refugios)
Route::middleware(['auth', 'role:refugio'])->group(function () {
    Route::view('/loginrefugio', 'loginrefugio')->name('loginrefugio');
    Route::post('/loginrefugio', [LoginController::class, 'RefugioLogin'])->name('refugio.login');
    Route::get('/perfilrefugio', [RoleController::class, 'perfilRefugio'])->name('perfilrefugio');
    Route::post('/perfilrefugio/actualizar', [RoleController::class, 'actualizarPerfilRefugio'])->name('perfilrefugio.actualizar');
});

// Registro de Perros (solo refugios y administradores)
Route::middleware(['auth', 'role:refugio,administrador'])->group(function () {
    Route::get('/registroperros', [PerrosController::class, 'create'])->name('perros.create');
    Route::post('/registroperros', [PerrosController::class, 'store'])->name('perros.store');
});

// Rutas para la vista de Viabilidad de Estudios y Seguimiento de Visitas
Route::prefix('viabilidadestudiovista')->middleware(['auth', 'role:administrador'])->group(function () {
    Route::get('/', [ViabilidadEstudioVistaController::class, 'mostrar'])->name('viabilidadestudiovista.mostrar');
    Route::post('/subir', [ViabilidadEstudioVistaController::class, 'subir'])->name('viabilidadestudiovista.subir');
});

// Rutas para la vista de Seguimiento de Visitas
Route::prefix('seguimientovisitasvista')->middleware(['auth', 'role:administrador'])->group(function () {
    Route::get('/', [SeguimientoVisitasVistaController::class, 'mostrar'])->name('seguimientovisitasvista.mostrar');
    Route::post('/subir', [SeguimientoVisitasVistaController::class, 'subir'])->name('seguimientovisitasvista.subir');
});

// Rutas de Autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rutas de Seguimiento Visitas Vista
Route::prefix('seguimientovisitasvista')->middleware('web')->group(function () {
    Route::get('/', [SeguimientoVisitasVistaController::class, 'mostrar'])->name('seguimientovisitasvista.mostrar');
    Route::post('/subir', [SeguimientoVisitasVistaController::class, 'subir'])->name('seguimientovisitasvista.subir'); // Asegurarse de que esta ruta esté protegida por el middleware web
    Route::patch('/desactivar/{id}', [SeguimientoVisitasVistaController::class, 'desactivar'])->name('seguimientovisitasvista.desactivar');
});

Route::resource('SeguimientoVisitas', SeguimientoVisitasController::class);

Route::prefix('seguimientovisitasvista')->group(function () {
    Route::get('/', [SeguimientoVisitasVistaController::class, 'mostrar'])->name('seguimientovisitasvista.mostrar');
    Route::post('/subir', [SeguimientoVisitasVistaController::class, 'subir'])->name('seguimientovisitasvista.subir');
});



// Rutas de Registro
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::get('/welcome', [EstadisticasController::class, 'metodo'])->name('welcome');

Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas');