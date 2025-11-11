@extends(
    'templates/main',
    [
        'titulo' => "Sistema Aula",
        'cabecalho' => 'Home - Dashboard',
        'rota' => 'aluno.create',
        'relatorio' => 'aluno.report',
    ]
)
@section('conteudo')
@endsection
