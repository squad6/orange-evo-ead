<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Cria um administrador padrão
        \App\Models\Admin::factory(1)->create();

        // Cria 3 trilhas
        \App\Models\Trail::create(
            [
                'title' => 'UX/UI Design',
                'description' => 'Se você chegou até aqui, é porque quer aprender mais sobre tecnologia, especialmente sobre UX/UI Design!',
                'time' => '30:00:00',
                'trail_by' => 'Carla Mendanha',
            ],
        );

        \App\Models\Trail::create(
            [
                'title' => 'QA (Quality Assurance)',
                'description' => 'Se você chegou até aqui, é porque quer aprender mais sobre tecnologia, especialmente sobre QA!',
                'time' => '180:00:00',
                'trail_by' => 'Tais Mafioleti',
            ],
        );

        \App\Models\Trail::create(
            [
                'title' => 'Desenvolvimento Full Stack',
                'description' => 'Se você chegou até aqui, é porque quer aprender mais sobre tecnologia, especialmente sobre Desenvolvimento Full Stack!',
                'time' => '50:00:00',
                'trail_by' => 'Rodrigo Carvalho e Allan Qualtieri',
            ],
        );

        // Cria 2 Módulos para cada trilha
        // UX/UI
        \App\Models\Module::create(
            [
                'trail_id' => 1,
                'title' => 'Módulo 1',
                'description' => 'Conteúdos inicias',
                'time' => '20:00:00',
            ],
        );

        \App\Models\Module::create(
            [
                'trail_id' => 1,
                'title' => 'Módulo 2',
                'description' => 'Conteúdos intermediário',
                'time' => '20:00:00',
            ],
        );

        // QA
        \App\Models\Module::create(
            [
                'trail_id' => 2,
                'title' => 'Módulo 1',
                'description' => 'Conteúdos inicias',
                'time' => '20:00:00',
            ],
        );

        \App\Models\Module::create(
            [
                'trail_id' => 2,
                'title' => 'Módulo 2',
                'description' => 'Conteúdos intermediário',
                'time' => '20:00:00',
            ],
        );

        // Dev Fullstack
        \App\Models\Module::create(
            [
                'trail_id' => 3,
                'title' => 'Módulo 1',
                'description' => 'Conteúdos inicias',
                'time' => '20:00:00',
            ],
        );

        \App\Models\Module::create(
            [
                'trail_id' => 3,
                'title' => 'Módulo 2',
                'description' => 'Conteúdos intermediário',
                'time' => '20:00:00',
            ],
        );

        // Cria 2 Conteúdos para cada módulo
        // UX/UI
        \App\Models\Content::create(
            [
                'module_id' => 1,
                'title' => 'Como migrar para UX Design',
                'description' => 'Guia definitivo de como migrar para UX Design: 5 passos para virar um UX.',
                'time' => '00:06:00',
                'type' => 'Artigo',
                'link' => 'https://medium.com/orangejuicefc/guia-definitivo-de-como-migrar-para-ux-design-5-passos-para-virar-um-ux-1675f71796b4',
                'content_by' => 'Oranje Juice',
                'subject' => 'Migração de carreira',
            ],
        );

        \App\Models\Content::create(
            [
                'module_id' => 1,
                'title' => 'O que faz ser quem somos?',
                'description' => 'Uma empresa precisa ter uma cultura para definir como iremos prosseguir e progredir em nossos trabalhos.',
                'time' => '01:22:25',
                'type' => 'Vídeo',
                'link' => 'https://www.youtube.com/watch?v=n0KH8dQSrv0',
                'content_by' => 'Grupo FCamara',
                'subject' => 'Culture Code',
            ],
        );

        \App\Models\Content::create(
            [
                'module_id' => 2,
                'title' => 'Experiência do Usuário',
                'description' => 'Vamos entender o que é Experiência de Usuário.',
                'time' => '00:30:00',
                'type' => 'Apostila',
                'link' => 'https://www.alura.com.br/apostila-ux-usabilidade-mobile-web/experiencia',
                'content_by' => 'Alura',
                'subject' => 'UX Research',
            ],
        );


        \App\Models\Content::create(
            [
                'module_id' => 2,
                'title' => 'Qual o papel do QA em uma equipe?',
                'description' => 'Você sabe o que um QA faz? Basta testar o produto? Só vou reportar erros? É necessário saber programar?',
                'time' => '00:04:00',
                'type' => 'Artigo',
                'link' => 'https://medium.com/orangejuicefc/qual-o-papel-do-qa-em-uma-equipe-8e8147be28dd',
                'content_by' => 'Orange Juice',
                'subject' => 'QA',
            ],
        );

        // QA
        \App\Models\Content::create(
            [
                'module_id' => 3,
                'title' => 'Com grandes códigos, vem grandes responsabilidades',
                'description' => 'Chegou a hora de falarmos da profissão do momento: tecnologia da informação!',
                'time' => '01:25:20',
                'type' => 'Live',
                'link' => 'https://www.youtube.com/watch?v=N78-5gHLzbE',
                'content_by' => 'Grupo FCamara',
                'subject' => 'Desenvolvimento',
            ],
        );

        \App\Models\Content::create(
            [
                'module_id' => 3,
                'title' => 'Product Owner, Scrum-Master e suas diferenças',
                'description' => 'Entenda esses 2 papéis do Scrum e suas diferenças',
                'time' => '01:13:33',
                'type' => 'Live',
                'link' => 'https://www.youtube.com/watch?v=_ku7bY5GtIY',
                'content_by' => 'Grupo FCamara',
                'subject' => 'Migração de carreira',
            ],
        );

        \App\Models\Content::create(
            [
                'module_id' => 4,
                'title' => 'Fundamentos iniciais da Metodologia Ágil',
                'description' => 'Fundamentos de Agilidade: seus primeiros passos para a transformação ágil.',
                'time' => '00:57:52',
                'type' => 'Artigo',
                'link' => 'https://medium.com/orangejuicefc/fundamento-iniciais-da-metodologia-%C3%A1gil-a4f3f0a3f025',
                'content_by' => 'Orange Juice',
                'subject' => 'Metodologia Ágil',
            ],
        );

        \App\Models\Content::create(
            [
                'module_id' => 4,
                'title' => 'Squads – o que é e como funciona?',
                'description' => 'Entenda o que é um SQUAD.',
                'time' => '00:06:00',
                'type' => 'Artigo',
                'link' => 'https://blog.fcamara.com.br/squads-o-que-e-e-como-funciona/',
                'content_by' => 'Grupo FCamara',
                'subject' => 'Squads',
            ],
        );

        // Dev Fullstack
        \App\Models\Content::create(
            [
                'module_id' => 5,
                'title' => 'O que um Dev júnior pode ensinar?',
                'description' => 'Para muitos profissionais, o status de júnior é a porta de entrada na carreira, e representa a possibilidade de ganho de conhecimento, experiência e mais maturidade no mundo corporativo',
                'time' => '00:50:29',
                'type' => 'Vídeo',
                'link' => 'https://www.youtube.com/watch?v=qZ4ZKJSmf4k',
                'content_by' => 'Orange Juice',
                'subject' => 'Dev Júnior',
            ],
        );

        \App\Models\Content::create(
            [
                'module_id' => 5,
                'title' => 'Instalar o Linux no Windows com o WSL',
                'description' => 'Aprenda a instalar o Linux utilizando o WSL',
                'time' => '00:20:00',
                'type' => 'Artigo',
                'link' => 'https://learn.microsoft.com/pt-br/windows/wsl/install',
                'content_by' => 'Windows',
                'subject' => 'Desenvolvimento',
            ],
        );

        \App\Models\Content::create(
            [
                'module_id' => 6,
                'title' => 'Introdução a Bancos de Dados e Linguagem SQL',
                'description' => 'Aprenda os Principais Conceitos de Banco de Dados e a Linguagem SQL.',
                'time' => '01:59:00',
                'type' => 'Curso',
                'link' => 'https://www.udemy.com/course/introducao-a-bancos-de-dados-e-linguagem-sql/',
                'content_by' => 'Udemy',
                'subject' => 'Banco de Dados',
            ],
        );

        \App\Models\Content::create(
            [
                'module_id' => 6,
                'title' => 'Versionamento com Git',
                'description' => 'Opa! Cheguei aqui para te mostrar mais uma Talks que rolou lá no nosso Discord! Dessa vez, Matheus Ferreira, desenvolvedor trainee no Grupo FCamara, veio para te ensinar o básico do Git.',
                'time' => '01:03:15',
                'type' => 'Vídeo',
                'link' => 'https://www.youtube.com/watch?v=9k_lIYuRtg8',
                'content_by' => 'Orange Juice',
                'subject' => 'Git e Github',
            ],
        );
    }
}
