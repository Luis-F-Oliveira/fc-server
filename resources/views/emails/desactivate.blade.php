<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body
  style="padding: 0px; margin: 0px; outline: 0px; box-sizing: border-box; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; background-color: #f1f5f9; width: 100%; height: 100%;">

  <table align="center" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f1f5f9; padding: 1rem;">
    <tr>
      <td
        style="text-align: center; font-weight: bold; font-size: 1.2rem; background-color: #f1f5f9; border-radius: 0.5rem; padding: 1rem; max-width: 33%; margin: auto; color: #64748b;">
        {{ env('APP_NAME') }}
      </td>
    </tr>
    <tr>
      <td style="padding: 1rem; background-color: #ffffff; border-radius: 0.5rem; margin: auto;">
        <p>
          Esta mensagem confirma que seu pedido de cancelamento de notificações foi concluído com sucesso. A partir
          deste momento, você não receberá mais e-mails. Caso deseje reativar as notificações, por favor, envie um
          e-mail para {{ config('mail.from.address') }}.
        </p>
        <p>
          Saudações, <br>
          {{ env('APP_NAME') }}
        </p>
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