<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdoptanteController;
use App\Http\Controllers\RefugioController;
use App\Http\Controllers\PerrosController;
use App\Http\Controllers\SeguimientoVisitasController;
use App\Http\Controllers\ViabilidadEstudiosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PerrosDisponiblesController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\SolicitudAdopcionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SeguimientoVisitasvistaController;

// Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Ruta para mostrar los perros disponibles
Route::get('/perrosdisponibles', [PerrosDisponiblesController::class, 'mostrar'])->name('perrosdisponibles');

// Ruta para manejar la solicitud de adopción (POST)
Route::post('/solicitud-adopcion', [SolicitudAdopcionController::class, 'store'])->name('solicitud.adopcion');

// 📌 Rutas de Registro de Adoptante y Refugio
Route::get('/registroadoptante', function () {
    return view('registroadoptante');
})->name('registroadoptante');

Route::post('/registroadoptante', [AdoptanteController::class, 'store'])->name('registroadoptante.submit');

Route::get('/registrorefugio', function () {
    return view('registrorefugio');
})->name('registrorefugio');

Route::post('/registrorefugio', [RefugioController::class, 'store'])->name('registrorefugio.submit');

// Rutas CRUD para las entidades principales
Route::resource('adoptantes', AdoptanteController::class);
Route::resource('refugios', RefugioController::class);

// Rutas de Perros (CRUD)
Route::get('/perros', [PerrosController::class, 'index'])->name('Perros.index');
Route::get('/perros/create', [PerrosController::class, 'create'])->name('Perros.create');
Route::post('/perros', [PerrosController::class, 'store'])->name('Perros.store');
Route::get('/perros/{perro}/edit', [PerrosController::class, 'edit'])->name('Perros.edit'); // Ruta para editar un perro
Route::put('/perros/{perro}', [PerrosController::class, 'update'])->name('Perros.update'); // Ruta para actualizar el perro
Route::delete('/perros/{perro}', [PerrosController::class, 'destroy'])->name('Perros.destroy'); // Ruta para eliminar un perro
Route::get('/perros/{perro}', [PerrosController::class, 'show'])->name('Perros.show');

// Rutas de Seguimiento de Visitas y Viabilidad de Estudios
Route::resource('SeguimientoVisitas', SeguimientoVisitasController::class);
Route::resource('ViabilidadEstudios', ViabilidadEstudiosController::class);

// Ruta para la página de cuidados
Route::get('/cuidados', function () {
    return view('cuidados');
})->name('cuidados');

// Autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

// Ruta para la administración
Route::get('/administracion', function () {
    return view('administracion');
})->name('administracion');

// Ruta para estadísticas
Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas.index');

// Ruta para perfil de adoptante
Route::get('/perfil', [AdoptanteController::class, 'perfil'])->name('perfil');
Route::post('/perfil/actualizar', [AdoptanteController::class, 'actualizarPerfil'])->name('perfil.actualizar');

// Login para Refugios
Route::get('/loginrefugio', function () {
    return view('loginrefugio');
})->name('loginrefugio');

// Ruta para procesar el login de refugios
Route::post('/loginrefugio', [RefugioController::class, 'login'])->name('refugio.login');

// Ruta de perfil de refugio
Route::get('/perfilrefugio', [RefugioController::class, 'perfil'])->name('perfilrefugio');

// Ruta para actualizar el perfil de refugio
Route::post('/perfilrefugio/actualizar', [RefugioController::class, 'actualizarPerfil'])->name('perfilrefugio.actualizar');

// Rutas para registro de perros (crear y almacenar)
Route::get('/registroperros', [PerrosController::class, 'create'])->name('perros.create');
Route::post('/registroperros', [PerrosController::class, 'store'])->name('perros.store');

Route::prefix('seguimientovisitasvista')->group(function () {
    Route::get('/', [SeguimientoVisitasVistaController::class, 'mostrar'])->name('seguimientovisitasvista.mostrar');
    Route::post('/subir', [SeguimientoVisitasVistaController::class, 'subir'])->name('seguimientovisitasvista.subir');
});