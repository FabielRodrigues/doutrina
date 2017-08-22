<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/contato', 'HomeController@contato');

Route::get('/cadastro', 'HomeController@cadastro');

Route::get('/send', 'HomeController@send');

// ACL INIT
/*
 * Rota para as views dos usuarios.
 */
Route::group(['prefix' => 'users',
    'as' => 'users',
    'middleware' => 'auth'],
    function ()
    {
        Route::auth();

        Route::get('/',
            ['as' => 'users/index',
                'uses' => 'UserController@index']);

        Route::get('/create',
            ['as' => 'users/create',
                'uses' => 'UserController@create']);

        Route::post('/store',
            ['as' => 'users/store',
                'uses' => 'UserController@store']);

        Route::get('/edit/{id}',
            ['as' => 'users/edit',
                'uses' => 'UserController@edit']);
        Route::get('/update/{id}',
            ['as' => 'users/update',
                'uses' => 'UserController@update']);
        Route::get('/destroy/{id}',
            ['as' => 'users/destroy',
                'uses' => 'UserController@destroy']);
        Route::get('/roles/{id}',
            ['as' => 'users/roles',
                'uses' => 'UserController@roles']);
        Route::post('/storerole/{id}',
            ['as' => 'users/storerole',
                'uses' => 'UserController@storeRole']);
        Route::get('/revokerole/{id}/{role_id}',
            ['as' => 'users/revokerole',
                'uses' => 'UserController@revokeRole']);
        Route::post('/profile',
            ['as' => 'users/profile',
                'uses' => 'UserController@profile']);
        Route::post('/update_avatar',
            ['as' => 'users/update_avatar',
                'uses' => 'UserController@update_avatar']);
        Route::get('/password/{id}',
            ['as' => 'users.password',
                'uses' => 'UserController@password']);
        Route::get('/updatepassword/{id}',
            ['as' => 'users.updatepassword',
                'uses' => 'UserController@updatepassword']);
});
/*
 * Roles
 */
Route::group(['prefix' => 'roles', 'as' => 'roles', 'middleware' => 'auth'], function (){

    Route::auth();
    Route::get('/',                                       ['as' => 'roles/index',       'uses' => 'RolesController@index']);
    Route::get('/create',                                 ['as' => 'roles/create',      'uses' => 'RolesController@create']);
    Route::post('/store',                                 ['as' => 'roles/store',       'uses' => 'RolesController@store']);
    Route::get('/edit/{id}',                              ['as' => 'roles/edit',        'uses' => 'RolesController@edit']);
    Route::put('/update/{id}',                            ['as' => 'roles/update',      'uses' => 'RolesController@update']);
    Route::get('/destroy/{id}',                           ['as' => 'roles/destroy',     'uses' => 'RolesController@destroy']);
    Route::get('/permissions/{id}',                       ['as' => 'roles/permissions', 'uses' => 'RolesController@permissions']);
    Route::post('/permissionstore/{id}',                  ['as' => 'roles/permissionstore', 'uses' => 'RolesController@permissionstore']);
    Route::get('/permissionrevoke/{id}/{permission_id}',  ['as' => 'roles/permissionrevoke', 'uses' => 'RolesController@permissionrevoke']);

});
/*
 * Routa de permissões
 */
Route::group(['prefix' => 'permissions', 'as' => 'permissions', 'middleware' => 'auth'], function (){

    Route::auth();
    Route::get('/',                                       ['as' => 'permissions/index',       'uses' => 'PermissionController@index']);
    Route::get('/create',                                 ['as' => 'permissions/create',      'uses' => 'PermissionController@create']);
    Route::post('/store',                                 ['as' => 'permissions/store',       'uses' => 'PermissionController@store']);
    Route::get('/edit/{id}',                              ['as' => 'permissions/edit',        'uses' => 'PermissionController@edit']);
    Route::put('/update/{id}',                            ['as' => 'permissions/update',      'uses' => 'PermissionController@update']);
    Route::get('/destroy/{id}',                           ['as' => 'permissions/destroy',     'uses' => 'PermissionController@destroy']);
});

// FIM ACL
/*
 * Rota para as views da departamento
 */
Route::group(['prefix' => 'departamento', 'middleware' => 'auth'], function(){

    Route::get('/',                ['as' => 'departamento/index',        'uses' => 'DepartamentoController@index']);
    Route::get('/create',          ['as' => 'departamento/create',       'uses' => 'DepartamentoController@create']);
    Route::post('/store',          ['as' => 'departamento/store',        'uses' => 'DepartamentoController@store']);
    Route::get('/edit/{id}',       ['as' => 'departamento/edit',         'uses' => 'DepartamentoController@edit']);
    Route::get('/update/{id}',     ['as' => 'departamento/update',       'uses' => 'DepartamentoController@update']);
    Route::get('/destroy/{id}',    ['as' => 'departamento/destroy',      'uses' => 'DepartamentoController@destroy']);
});
/*
 * Rota para as views da curso
 */
Route::group(['prefix' => 'curso', 'middleware' => 'auth'], function(){

    Route::get('/',                ['as' => 'curso/index',        'uses' => 'CursoController@index']);
    Route::get('/create',          ['as' => 'curso/create',       'uses' => 'CursoController@create']);
    Route::post('/store',          ['as' => 'curso/store',        'uses' => 'CursoController@store']);
    Route::get('/edit/{id}',       ['as' => 'curso/edit',         'uses' => 'CursoController@edit']);
    Route::get('/update/{id}',     ['as' => 'curso/update',       'uses' => 'CursoController@update']);
    Route::get('/destroy/{id}',    ['as' => 'curso/destroy',      'uses' => 'CursoController@destroy']);
});
/*
 * Rota para as views da ciclo
 */
Route::group(['prefix' => 'ciclo', 'middleware' => 'auth'], function(){

    Route::get('/',                ['as' => 'ciclo/index',        'uses' => 'CicloController@index']);
    Route::get('/create',          ['as' => 'ciclo/create',       'uses' => 'CicloController@create']);
    Route::post('/store',          ['as' => 'ciclo/store',        'uses' => 'CicloController@store']);
    Route::get('/edit/{id}',       ['as' => 'ciclo/edit',         'uses' => 'CicloController@edit']);
    Route::get('/update/{id}',     ['as' => 'ciclo/update',       'uses' => 'CicloController@update']);
    Route::get('/destroy/{id}',    ['as' => 'ciclo/destroy',      'uses' => 'CicloController@destroy']);
});
/*
 * Rota para as views da turma
 */
Route::group(['prefix' => 'turma', 'middleware' => 'auth'], function(){

    Route::get('/',
        ['as' => 'turma/index',
            'uses' => 'TurmaController@index']);
    Route::get('/create',
        ['as' => 'turma/create',
            'uses' => 'TurmaController@create']);
    Route::post('/store',
        ['as' => 'turma/store',
            'uses' => 'TurmaController@store']);
    Route::get('/edit/{id}',
        ['as' => 'turma/edit',
            'uses' => 'TurmaController@edit']);
    Route::get('/update/{id}',
        ['as' => 'turma/update',
            'uses' => 'TurmaController@update']);
    Route::get('/destroy/{id}',
        ['as' => 'turma/destroy',
            'uses' => 'TurmaController@destroy']);
    Route::get('/alunos/{id}',
        ['as' => 'turma/alunos',
            'uses' => 'TurmaController@alunos']);

});
/*
 * Rota para as views da aluno
 */
Route::group(['prefix' => 'aluno', 'middleware' => 'auth'], function(){

    Route::get('/',
        ['as' => 'aluno/index',
            'uses' => 'AlunoController@index']);
    Route::get('/create',
        ['as' => 'aluno/create',
            'uses' => 'AlunoController@create']);
    Route::get('/createadulto',
        ['as' => 'aluno/createadulto',
            'uses' => 'AlunoController@createAdulto']);
    Route::get('/createcrianca',
        ['as' => 'aluno/createcrianca',
            'uses' => 'AlunoController@createCrianca']);
    Route::post('/storeAdulto',
        ['as' => 'aluno/storeAdulto',
            'uses' => 'AlunoController@storeAdulto']);
    Route::post('/storeCrianca',
        ['as' => 'aluno/storeCrianca',
            'uses' => 'AlunoController@storeCrianca']);
    Route::get('/edit/{id}',
        ['as' => 'aluno/edit',
            'uses' => 'AlunoController@edit']);
    Route::get('/update/{id}',
        ['as' => 'aluno/update',
            'uses' => 'AlunoController@update']);
    Route::get('/editcontato/{id}',
        ['as' => 'aluno/editcontato',
            'uses' => 'AlunoController@editContato']);
    Route::get('/editcrianca/{id}',
        ['as' => 'aluno/editcrianca',
            'uses' => 'AlunoController@editCrianca']);
    Route::get('/updatecontato/{id}',
        ['as' => 'aluno/updatecontato',
            'uses' => 'AlunoController@updateContato']);
    Route::get('/updatecrianca/{id}',
        ['as' => 'aluno/updatecrianca',
            'uses' => 'AlunoController@updateCrianca']);
    Route::get('/editendereco/{id}',
        ['as' => 'aluno/editendereco',
            'uses' => 'AlunoController@editEndereco']);
    Route::get('/updateendereco/{id}',
    ['as' => 'aluno/updateendereco',
        'uses' => 'AlunoController@updateEndereco']);
    Route::get('/cursos/{id}',
        ['as' => 'aluno/cursos',
            'uses' => 'AlunoController@cursos']);
    Route::get('/storecursos/{id}',
        ['as' => 'aluno/storecursos',
            'uses' => 'AlunoController@storecursos']);
    Route::get('/revokecursos/{id}/{turmas_id}',
        ['as' => 'aluno/revokecursos',
            'uses' => 'AlunoController@revokecursos']);
    Route::get('/parentes/{id}',
        ['as' => 'aluno/parentes',
            'uses' => 'AlunoController@parentes']);
    Route::post('/storeparentes',
        ['as' => 'aluno/storeparentes',
            'uses' => 'AlunoController@storeparentes']);
    Route::get('/destroy/{id}',
        ['as' => 'aluno/destroy',
            'uses' => 'AlunoController@destroy']);
    Route::get('/ajaxcurso/{id}',
        ['as' => 'aluno/ajaxcurso',
            'uses' => 'AlunoController@ajaxcurso']);
    Route::get('/ajaxciclo/{id}',
        ['as' => 'aluno/ajaxciclo',
            'uses' => 'AlunoController@ajaxciclo']);
    Route::get('/ajaxturma/{id}',
        ['as' => 'aluno/ajaxturma',
            'uses' => 'AlunoController@ajaxturma']);
    Route::get('/profile/{id}',
        ['as' => 'aluno/profile',
            'uses' => 'AlunoController@profile']);
});
/*
 * Route of the frequency
 */
Route::group(['prefix'=> 'frequencia', 'as' => 'frequencia', 'middleware' => 'auth'], function (){

    Route::auth();
    Route::get('/',
        ['as' => 'frequencia/index',
            'uses' => 'FrequenciaController@index']);
    Route::get('/chamada/{id}',
        ['as' => 'frequencia/chamada',
            'uses' => 'FrequenciaController@chamada']);
    Route::post('/storechamada',
        ['as' => 'frequencia/storechamada',
            'uses' => 'FrequenciaController@chamadaStore']);
    Route::get('/listarchamadas/{id}',
        ['as' => 'frequencia/listarchamadas',
            'uses' => 'FrequenciaController@listarchamadas']);
    Route::get('/editarchamada/{data}',
        ['as' => 'frequencia/editarchamada',
            'uses' => 'FrequenciaController@editarChamada']);
    Route::get('/editar/{id}',
        ['as' => 'frequencia/editar',
            'uses' => 'FrequenciaController@editar']);
    Route::get('/update/{id}',
        ['as' => 'frequencia/update',
            'uses' => 'FrequenciaController@update']);
    Route::get('/destroy/{id}/{data}',
        ['as' => 'frequencia/destroy',
            'uses' => 'FrequenciaController@destroy']);

});
/*
 * Route of the Relatorios
 */
Route::group(['prefix' => 'relatorios', 'as' => 'relatorios.', 'middleware' => 'auth'], function (){

    Route::auth();
    Route::get('/',                                ['as'   => 'listaturmas',                  'uses' => 'RelatorioController@listarTurmas']);
    Route::get('/relatorioperiodico/{id}',         ['as'   => 'relatorioperiodico',           'uses' => 'RelatorioController@relatorioPeriodico']);
    Route::post('/resultadorelatorioperiodico',    ['as'   => 'resultadorelatorioperiodico',  'uses' => 'RelatorioController@resultadorelatorioperiodico']);
    Route::get('/listaralunos/{id}',               ['as'   => 'listaralunos',                 'uses' => 'RelatorioController@listaralunos']);
    Route::get('/relatoriomonitores',              ['as'   => 'relatoriomonitores',           'uses' => 'RelatorioController@relatoriomonitores']);

});

Route::group(['prefix' => 'monitores',
    'as' => 'monitores',
    'middleware' => 'auth'],
    function (){

        Route::auth();

        Route::get('/',
            ['as' => 'monitores.index',
                'uses' => 'MonitorController@index']);

        Route::get('/create',
            ['as' => 'monitores.create',
                'uses' => 'MonitorController@create']);

        Route::post('/store',
            ['as' => 'monitores.store',
                'uses' => 'MonitorController@store']);

        Route::get('/edit/{id}',
            ['as' => 'monitores.edit',
                'uses' => 'MonitorController@edit']);

        Route::get('/update/{id}',
            ['as'=> 'monitores.update',
                'uses' => 'MonitorController@update']);

        Route::get('/view/{id}',
            ['as' => 'monitores.view',
                'uses' => 'MonitorController@view']);

        Route::get('/vincular/{id}',
            ['as' => 'monitores.vincular',
                'uses' => 'MonitorController@vincular']);

        Route::post('/vincularstore',
            ['as' => 'monitores.vincularstore',
                'uses' => 'MonitorController@vincularStore']);

        Route::get('/vincularRevoke/{id}',
            ['as' => 'monitores.vincularRevoke',
                'uses' => 'MonitorController@vincularRevoke']);


});
/*
 * Route of the logs
 */
Route::group(['prefix' => 'arquivos', 'as' => 'arquivos', 'middleware' => 'auth'], function (){

    Route::auth();
    Route::get('/',                           ['as' => 'arquivos/index', 'uses' => 'FileController@index']);
    Route::post('/upload',                    ['as' => 'arquivos/upload', 'uses' => 'FileController@upload']);
    Route::get('/download/{fileId}',          ['as' => 'arquivos/download', 'uses' => 'FileController@download']);
    Route::get('/destroy/{fileId}',           ['as' => 'arquivos/destroy', 'uses' => 'FileController@destroy']);

});
/*
 * Route of perfil
 */
Route::group(['prefix' => 'perfil', 'as' => 'perfil.', 'middleware' => 'auth'], function (){

    Route::get('/',               ['as' => 'index',          'uses' => 'PerfilController@index']);
    Route::get('/editarsobre',    ['as' => 'editarsobre',    'uses' => 'PerfilController@editarsobre']);
    Route::get('/editaremail',    ['as' => 'editaremail',    'uses' => 'PerfilController@editaremail']);
    Route::get('/editarendereco', ['as' => 'editarendereco', 'uses' => 'PerfilController@editarendereco']);
    Route::post('/updatesobre',    ['as' => 'updatesobre',    'uses' => 'PerfilController@updatesobre']);
    Route::post('/updateemail',    ['as' => 'updateemail',    'uses' => 'PerfilController@updateemail']);
    Route::get('/updateendereco', ['as' => 'updateendereco', 'uses' => 'PerfilController@updateendereco']);
    Route::get('/alterarsenha',   ['as' => 'alterarsenha',   'uses' => 'PerfilController@alterarsenha']);
    Route::get('/senhaupdate',    ['as' => 'senhaupdate',    'uses' => 'PerfilController@senhaupdate']);

});







