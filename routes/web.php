<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return view('welcome');
    });

    //generos
    Route::get('/genero/index', [GeneroController::class, 'index'])->name('genero.index');
    Route::get('/genero/create', [GeneroController::class, 'create'])->name('genero.create');
    Route::post('/genero/store', [GeneroController::class, 'store'])->name('genero.store');
    Route::get('/genero/edit/{id}', [GeneroController::class, 'edit'])->name('genero.edit');
    Route::post('/genero/update/{id}', [GeneroController::class, 'update'])->name('genero.update');
    Route::get('/genero/destroy/{id}', [GeneroController::class, 'destroy'])->name('genero.destroy');

    //filmes
    Route::get('/filme/index', [FilmeController::class, 'index'])->name('filme.index');
    Route::get('/filme/create', [FilmeController::class, 'create'])->name('filme.create');
    Route::post('/filme/store', [FilmeController::class, 'store'])->name('filme.store');
    Route::get('/filme/edit/{id}', [FilmeController::class, 'edit'])->name('filme.edit');
    Route::post('/filme/update/{id}', [FilmeController::class, 'update'])->name('filme.update');
    Route::get('/filme/destroy/{id}', [FilmeController::class, 'destroy'])->name('filme.destroy');

    //clientes
    Route::get('/cliente/index', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/edit/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::post('/cliente/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::get('/cliente/destroy/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
    Route::get('/cliente/mensagem/{id}', [ClienteController::class, 'mensagem'])->name('cliente.mensagem');
    Route::post('/cliente/enviarMensagem', [ClienteController::class, 'enviarMensagem'])->name('cliente.enviarMensagem');

    //locacoes
    Route::get('/locacao/index', [LocacaoController::class, 'index'])->name('locacao.index');
    Route::get('/locacao/create', [LocacaoController::class, 'create'])->name('locacao.create');
    Route::post('/locacao/store', [LocacaoController::class, 'store'])->name('locacao.store');
    Route::get('/locacao/edit/{id}', [LocacaoController::class, 'edit'])->name('locacao.edit');
    Route::post('/locacao/update/{id}', [LocacaoController::class, 'update'])->name('locacao.update');
    Route::get('/locacao/destroy/{id}', [LocacaoController::class, 'destroy'])->name('locacao.destroy');
    Route::get('/locacao/relatorio', [LocacaoController::class, 'relatorio'])->name('locacao.relatorio');
});

require __DIR__.'/auth.php';
