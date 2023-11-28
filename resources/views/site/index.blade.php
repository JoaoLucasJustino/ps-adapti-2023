{{-- Front-end começa aqui! --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>ConectGrad</title>



</head>

<body id="body">
    <header id="cabecalho">
        <div class="logo">
            <img src="{{ asset('site/imagens/logo1.png') }}" alt="Logo do Conect Grad" />
            <h1>ConectGrad</h1>
        </div>

        <nav>
            <ul>
                <li><a href="./login">Admin</a></li>
                <li>
                    <button id="mudar" onclick = "toggleDarkMode()"></button>
                </li>
            </ul>
        </nav>

    </header>

    <main id="principal">
        <div id="conteines-cards">
            @foreach ($alunos as $aluno)
                <div class="card">
                    <div class="foto">
                        <img src="{{ url($aluno->imagem) }}" alt="Foto aluno">
                    </div>

                    <div id="info">
                        <div class="info1">
                            <ul>
                                <li>
                                    <p id="nome" class="info">Nome: {{ $aluno->nome }}</p>
                                </li>
                                @foreach ($cursos as $curso)
                                    @if ($aluno->curso_id == $curso->id)
                                        <li>
                                            <p id="Curso" class="info">Curso: {{ $curso->curso }}</p>
                                        </li>
                                    @endif
                                @endforeach
                                <li>
                                    <p id="situcao" class="info">Situação:
                                        {{ $aluno->formado != '0' ? 'Graduação completa' : 'Graduação incompleta' }}</p>
                                </li>
                                <li>
                                    <p id="descricao" class="info">Descrição: {{ $aluno->descricao }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="info2">
                            @if ($aluno->contratado)
                                <button class="botaoContratado" type="submit">CONTRATADO</button>
                            @else
                                <form action="{{ route('aluno.contratar', $aluno) }}" method="post">
                                    @csrf
                                    <button class="botaoContratar" type="submit">CONTRATAR</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </main>
</body>

@push('js')
    <script>
        let darkmode = false;

        const isdarkmode = localStorage.getItem("darkmode");

        if (isdarkmode) {
            darkmode = JSON.parse(isdarkmode);
            aplicartema();
        }

        function aplicartema() {
            const body = document.body;
            if (darkmode) {
                body.classList.add("dark");
            } else {
                body.classList.remove("dark");
            }
        }

        function toggleDarkMode() {
            darkmode = !darkmode;
            localStorage.setItem("darkmode", darkmode);
            aplicartema();
        }
    </script>




    </html>
