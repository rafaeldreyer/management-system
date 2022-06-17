<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function() {return 'Login';})->name('site.login');

Route::prefix('/app')->group(function() { // função de callback que agrupa as rotas que estão dentro do prefixo, tornando-as dependentes do mesmo para serem acessadas.
    Route::get('/clientes', [\App\Http\Controllers\ClientesController::class, 'clientes'])->name('app.clientes');
    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'fornecedor'])->name('app.fornecedor');
    Route::get('/produtos', [\App\Http\Controllers\ProdutosController::class, 'produtos'])->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

Route::fallback(function() {
    echo 'A rota acessada não existe <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
