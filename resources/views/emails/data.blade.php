<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facilita Diário</title>
</head>

<body style="margin:0; padding:0; background-color:#f8fafc; font-family:Arial, sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0"
    style="max-width:600px; margin:0 auto; background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 6px rgba(0,0,0,0.1);">
    <!-- Header -->
    <tr>
      <td style="background-color:#097905; padding:30px 20px; text-align:center;">
        <h1 style="color:#ffffff; margin:0; font-size:24px;">{{ env('APP_NAME') }}</h1>
      </td>
    </tr>

    <!-- Content -->
    <tr>
      <td style="padding:40px 30px;">
        <!-- Greeting -->
        <p style="margin:0 0 20px; color:#1e293b;">
          Prezado(a),
          <span style="background-color:#dbeafe; padding:2px 6px; border-radius:4px; font-weight:bold;">
            {{ $servant['name'] }}
          </span>
        </p>

        <!-- Service Info -->
        <div style="background-color:#f1f5f9; padding:20px; border-radius:6px; margin-bottom:30px;">
          <p style="margin:0; color:#475569; line-height:1.6;">
            Esta mensagem foi produzida pelo serviço <strong>"FACILITA DIÁRIO"</strong> da
            <strong>DIRETORIA DE GESTÃO DE PESSOAS</strong>.
          </p>
        </div>

        <!-- Publications -->
        <div style="margin:30px 0;">
          @foreach ($groupedData as $data)
          <div
            style="border-left:4px solid #097905; padding:15px; margin-bottom:15px; background-color:#f8fafc; transition: all 0.3s ease;">
            <a href="{{ env('APP_URL') }}/redirect/{{ $data['id'] }}" target="_blank"
              style="text-decoration:none; color:#1e293b; display:block; padding:5px 0;">
              <h2 style="margin:0; font-size:16px; color:#097905;">{{ $data['order'] }}</h2>
            </a>
          </div>
          @endforeach
        </div>

        <!-- Disclaimer -->
        <div style="background-color:#fef2f2; padding:20px; border-radius:6px; margin:30px 0;">
          <p style="margin:0; color:#991b1b; font-size:14px; line-height:1.6;">
            Este serviço é um projeto experimental e não substitui a obrigação de leitura do Diário Oficial diretamente
            dos sistemas do IOMAT.
          </p>
        </div>

        <!-- Signature -->
        <p style="color:#64748b; margin:30px 0 0;">
          Saudações,<br>
          <strong style="color:#1e293b;">{{ env('APP_NAME') }}</strong>
        </p>
      </td>
    </tr>

    <!-- Footer -->
    <tr>
      <td style="background-color:#f1f5f9; padding:20px; text-align:center;">
        <p style="margin:0; color:#94a3b8; font-size:14px;">
          © 2025 {{ env('APP_NAME') }}. Todos os direitos reservados.
        </p>
      </td>
    </tr>
  </table>
</body>

</html>