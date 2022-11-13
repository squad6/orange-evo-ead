@extends('user.layouts.home')

@section('page-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Card Title -->
        <div class="card shadow mb-4" style="background-color: #FFDACC;">
            <div class="py-3">
                <h2 class="m-0 font-weight-bold" style="padding-left: 1%; color: #36357E">
                    <i class="fas fa-fw fa-user-friends"></i>
                    Orange Juice
                </h2>
                <div class="row">
                    <div class="col-xl-5 col-md-6 mb-4">
                        <div class="card-body" style="color: black">
                            <p>
                                A comunidade tech mais vitaminada!
                            </p>
                            <p>
                                Conecte-se com pessoas com os mesmos interesses que você, enquanto aprende sobre as maiores tendências do mundo da tecnologia 🍊. Veja os links do nosso ecossistema abaixo:
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Title -->

        <!-- Content Row -->
        <div class="row">
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold" style="color: #36357E;">Orange Juice Cast</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <p style="color:black;">
                            O ‘podcast’ vitaminado que compartilha experiências e dicas de profissionais que já estão no mercado. O anfitrião, Joel Backschat, CTO do Grupo FCamara, traz convidados...
                        </p>
                        <a class="btn btn-block" href="https://www.youtube.com/playlist?list=PLn9-AyVYB5GMbiG_7MerXuA6Hv1TChAbE" style="background-color: #36357E; color: white">
                            Acessar <i class="fas fa-fw fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold" style="color: #36357E;">Orange Talks</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <p style="color:black;">
                            Lives que acontecem no nosso canal da Twitch, e buscam trazer um bate-papo com você e mostrar-lhe novos caminhos a seguir nessa jornada...                        </p>
                        <a class="btn btn-block" href="https://www.twitch.tv/orangejuice_tech" style="background-color: #36357E; color: white">
                            Acessar <i class="fas fa-fw fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold" style="color: #36357E;">Comunidade no Discord</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <p style="color:black;">
                            Uma comunidade feita para e por você, que está a começar ou migrando para a área de tecnologia. Aqui a troca de conhecimento é constante.
                        </p>
                        <a class="btn btn-block" href="https://discord.com/invite/NtESsDFGx5" style="background-color: #36357E; color: white">
                            Acessar <i class="fas fa-fw fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold" style="color: #36357E;">Canal Orange Juice</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <p style="color:black;">
                            Perdeu uma talk ou uma live? Prefere ver podcasts gravados em vídeo?
                            Não tem problema! Em nosso canal no Youtube, disponibilizamos...
                        </p>
                        <a class="btn btn-block" href="https://www.youtube.com/c/OrangeJuicefc" style="background-color: #36357E; color: white">
                            Acessar <i class="fas fa-fw fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold" style="color: #36357E;">Canal Medium</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <p style="color:black;">
                            Nosso blog com conteúdos vitaminados sobre tecnologia e muito mais!
                            Você terá acesso a artigos que vão desde comunicação, metodologias e...
                        </p>
                        <a class="btn btn-block" href="https://medium.com/orangejuicefc" style="background-color: #36357E; color: white">
                            Acessar <i class="fas fa-fw fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
