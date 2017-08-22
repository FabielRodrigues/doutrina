<?php

use Illuminate\Database\Seeder;

class UserRolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $this->call(UsersTableSeeder::class);

        $user = factory(\Doutrina\Models\User::class)->create([
            'name'     => 'Fabiel Rodrigues',
            'email'    => 'fabiel.rodrigues@gmail.com',
            'password' => bcrypt(A741b852)
        ]);

        $roleAdmin = factory(\Doutrina\Models\Role::class)->create([
            'name'        => 'Administrador',
            'description' => 'Administrador do sistema'
        ]);

        $monitor = factory(\Doutrina\Models\Role::class)->create([
            'name'        => 'Monitor',
            'description' => 'Monitor no sistema'
        ]);

        $aluno = factory(\Doutrina\Models\Role::class)->create([
            'name'        => 'Aluno',
            'description' => 'Aluno no sistema'
        ]);



        $user->addRole($roleAdmin);

        /*
         * Permissão de permissões
         */

        $userPermission0     = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Cadastrar minhas permissões',
            'description' => 'Cadastrar minhas permissões na minha função.'
        ]);

        $userPermission1  = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Cadastrar permissões',
            'description' => 'Cadastrar permissões no sistema.'
        ]);

        $userPermission2  = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Deletar permissões',
            'description' => 'Deletar permissões no sistema.'
        ]);

        $userPermission3  = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Editar permissões',
            'description' => 'Editar permissões do sistema.'
        ]);

        $userPermission4  = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Listar permissões',
            'description' => 'Listar permissões do sistema.'
        ]);

        $userPermission5  = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Menu permissões',
            'description' => 'Visualizar menu permissões.'
        ]);

        $userPermission6  = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Minhas Permissões',
            'description' => 'Visualizar minhas permissões.'
        ]);

        /*
         * Permissão de funções
         */
        $userPermission7  = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Cadastrar funções',
            'description' => 'Cadastrar as funções no sistema.'
        ]);

        $userPermission8  = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Deletar funções',
            'description' => 'Deletar funções do sistema.'
        ]);

        $userPermission9  = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Editar funções',
            'description' => 'Editar funções do sistema.'
        ]);

        $userPermission10 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Listar as próprias funções',
            'description' => 'Listar as próprias funções.'
        ]);

        $userPermission11 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Listar funções',
            'description' => 'Listar funções do sistema'
        ]);

        $userPermission12 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Menu funções',
            'description' => 'Visualizar menu funções'
        ]);

        $userPermission13 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Revogar função',
            'description' => 'Revogar função do usuário'
        ]);

        $userPermission14 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Revogar minha permissão',
            'description' => 'Revogar minha permissão da função.'
        ]);

        /*
         * Permissões de usuário
         */

        $userPermission15 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Listar usuários',
            'description' => 'Lista todos os usuários do sistema.'
        ]);



        $userPermission16 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Cadastrar usuários',
            'description' => 'Cadastra qualquer usuário no sistema.'
        ]);

        $userPermission17 = factory(\Doutrina\Models\Permission::class)->create([
            'name'         => 'Editar usuários',
            'description'  => 'Edita qualquer usuário no sistema.'
        ]);

        $userPermission18 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Deletar usuários',
            'description' => 'Deleta qualquer usuário do sistema'
        ]);

        $userPermission19 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Menu usuários',
            'description' => 'Visualizar menu usuários'
        ]);


        $roleAdmin->addPermission($userPermission0);
        $roleAdmin->addPermission($userPermission1);
        $roleAdmin->addPermission($userPermission2);
        $roleAdmin->addPermission($userPermission3);
        $roleAdmin->addPermission($userPermission4);
        $roleAdmin->addPermission($userPermission5);
        $roleAdmin->addPermission($userPermission6);
        $roleAdmin->addPermission($userPermission7);
        $roleAdmin->addPermission($userPermission8);
        $roleAdmin->addPermission($userPermission9);
        $roleAdmin->addPermission($userPermission10);
        $roleAdmin->addPermission($userPermission11);
        $roleAdmin->addPermission($userPermission12);
        $roleAdmin->addPermission($userPermission13);
        $roleAdmin->addPermission($userPermission14);
        $roleAdmin->addPermission($userPermission15);
        $roleAdmin->addPermission($userPermission16);
        $roleAdmin->addPermission($userPermission17);
        $roleAdmin->addPermission($userPermission18);
        $roleAdmin->addPermission($userPermission19);

        #################FIM-USUARIO##################


        #################PERMISSOES DE MENU###########

        $userPermission20 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Menu alunos',
            'description' => 'Visualizar menu alunos'
        ]);

        $monitor->addPermission($userPermission20);

        $userPermission21 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Menu departamentos',
            'description' => 'Visualizar menu departamentos'
        ]);

        $monitor->addPermission($userPermission21);

        $userPermission22 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Menu cursos',
            'description' => 'Visualizar menu cursos'
        ]);

        $monitor->addPermission($userPermission22);

        $userPermission23 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Menu ciclos',
            'description' => 'Visualizar menu ciclos'
        ]);

        $monitor->addPermission($userPermission23);

        $userPermission24 = factory(\Doutrina\Models\Permission::class)->create([
            'name'        => 'Menu turmas',
            'description' => 'Visualizar menu turmas'
        ]);

        $monitor->addPermission($userPermission24);

        #################FIM-MENU##################




    }
}
