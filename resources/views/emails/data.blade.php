<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body style="padding: 0px; margin: 0px; outline: 0px; box-sizing: border-box; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; background-color: #f1f5f9; width: 100%; height: 100%;">

  <table align="center" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f1f5f9; padding: 1rem;">
    <tr>
      <td style="text-align: center; font-weight: bold; font-size: 1.2rem; background-color: #f1f5f9; border-radius: 0.5rem; padding: 1rem; max-width: 33%; margin: auto; color: #64748b;">
        {{ env('APP_NAME') }}
      </td>
    </tr>
    <tr>
      <td style="padding: 1rem; background-color: #ffffff; border-radius: 0.5rem; margin: auto;">
        <p>
          Prezado(a),
          <span style="background-color: #dcfce7; padding: 0 2px;">
            {{ $servant['name'] }}
          </span>
        </p>
        <p>
          Essa mensagem foi produzida pelo serviço <strong>"FACILITA DIÁRIO"</strong> da
          <strong>DIRETORIA DE GESTÃO DE PESSOAS.</strong> Para mais informações sobre o serviço,
          entre em contato: {{ config('mail.from.address') }}.
        </p>
        <ul style="list-style: none; padding: 0; text-align: center;">
          @foreach ($groupedData as $data)
          <li style="margin-bottom: 0.8rem;">
            <a href="{{ $data['url'] }}" target="_blank" style="text-decoration: none; color: #1e293b;">
              <h1 style="font-size: 1.1rem; margin: 0;">{{ $data['order'] }}</h1>
            </a>
          </li>
          @endforeach
        </ul>
        <p>
          Este serviço é um projeto experimental da Diretoria de Gestão de Pessoas com objetivo de facilitar o
          acompanhamento de publicações da Defensoria Pública pelos seus servidores, não substituindo, de qualquer forma,
          a obrigação de leitura do Diário Oficial diretamente dos sistemas do IOMAT.
        </p>
        <p>
          Destacamos que o acompanhamento somente compreende as publicações da Defensoria Pública do Estado de Mato
          Grosso.
        </p>
        <p>
          Saudações, <br>
          {{ env('APP_NAME') }}
        </p>
        <hr style="border: 1px solid #e2e8f0; margin: 0.8rem 0;">
        <div style="text-align: center; margin-bottom: 1.5rem;">
          <p style="margin-bottom: 10px;">
            Para deixar de receber e-mail de notificação, clique no botão abaixo.
          </p>
          <a href="{{ $apiUrl }}" style="text-decoration: none; cursor: pointer;">
            <button style="width: 180px; height: 35px; background-color: #1e293b; border-radius: 0.5rem; border: 0; color: #ffffff; font-size: 0.8rem; transition: 1s; display: inline-block;">
              Desabilitar Notificações
            </button>
          </a>
          <p>
            Se você estiver com problemas para clicar no botão "Desabilitar Notificações", copie e cole o URL abaixo em seu
            navegador da web: <a href="{{ $apiUrl }}" style="color: #1e293b;">
              {{ $apiUrl }}
            </a>
          </p>
        </div>
      </td>
    </tr>
    <tr>
      <td style="text-align: center; color: #94a3b8; padding: 1rem;">
        © 2024 {{ env('APP_NAME') }}. Todos os direitos reservados.
      </td>
    </tr>
  </table>

</body>

</html>
