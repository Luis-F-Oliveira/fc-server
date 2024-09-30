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
        <div style="text-align: center; margin-bottom: 1.5rem;">
          <p style="margin-bottom: 10px;">
            Para deixar de receber e-mail de notificação, clique no botão abaixo.
          </p>
          <a href="{{ $apiUrl }}" style="text-decoration: none;">
            <button style="width: 180px; height: 35px; cursor: pointer; background-color: #b91c1c; border-radius: 0.5rem; border: 0; color: #ffffff; font-size: 0.8rem; transition: 1s; display: inline-block;">
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