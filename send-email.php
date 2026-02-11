<?php
// send-email.php - Processador de Formulário de Contacto
// IMPORTANTE: Este é um exemplo básico. Para produção, adicione mais validações e segurança.

// Apenas permitir POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    die("Método não permitido");
}

// Configurações
$destinatario = "geralemmconsultoria@gmail.com";
$cc_destinatario = ""; // Email adicional para cópia (opcional)

// Receber e limpar dados do formulário
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$servico = filter_input(INPUT_POST, 'servico', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
$hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

// Validar campos obrigatórios
if (empty($nome) || empty($email) || empty($telefone) || empty($servico) || empty($data) || empty($hora)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Todos os campos obrigatórios devem ser preenchidos.']);
    exit;
}

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Email inválido.']);
    exit;
}

// Preparar assunto e corpo do email
$assunto = "Nova Reunião Agendada - $nome";

$corpo_email = "
========================================
NOVA REUNIÃO AGENDADA
========================================

DADOS DO CLIENTE:
Nome: $nome
Email: $email
Telefone: $telefone

DETALHES DA REUNIÃO:
Serviço: $servico
Data: $data
Hora: $hora

MENSAGEM:
$mensagem

========================================
Enviado via formulário do website
Data/Hora: " . date('d/m/Y H:i:s') . "
========================================
";

// Headers do email
$headers = "From: $nome <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

if (!empty($cc_destinatario)) {
    $headers .= "Cc: $cc_destinatario\r\n";
}

// Enviar email
$email_enviado = mail($destinatario, $assunto, $corpo_email, $headers);

if ($email_enviado) {
    // Opcional: Enviar email de confirmação ao cliente
    enviar_confirmacao_cliente($email, $nome, $data, $hora, $servico);
    
    // Resposta de sucesso
    http_response_code(200);
    echo json_encode([
        'success' => true, 
        'message' => 'Reunião agendada com sucesso! Entraremos em contacto em breve.'
    ]);
} else {
    // Erro ao enviar
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Erro ao enviar mensagem. Por favor, tente novamente ou contacte-nos diretamente.'
    ]);
}

// Função para enviar confirmação ao cliente
function enviar_confirmacao_cliente($email_cliente, $nome, $data, $hora, $servico) {
    $assunto_cliente = "Confirmação de Agendamento - Consultoria E.M";
    
    $corpo_cliente = "
Olá $nome,

Obrigado por agendar uma reunião connosco!

DETALHES DA SUA REUNIÃO:
Data: $data
Hora: $hora
Serviço: $servico

Entraremos em contacto em breve para confirmar a reunião.

Se tiver alguma questão, pode contactar-nos:
Telefone: +244 934 465 141
Email: geralemmconsultoria@gmail.com

Atenciosamente,
Equipa Consultoria E.M
";
    
    $headers_cliente = "From: Consultoria E.M <geralemmconsultoria@gmail.com>\r\n";
    $headers_cliente .= "Reply-To: geralemmconsultoria@gmail.com\r\n";
    
    mail($email_cliente, $assunto_cliente, $corpo_cliente, $headers_cliente);
}

// Opcional: Integração com SMS (Twilio, Nexmo, etc.)
function enviar_sms_notificacao($telefone_destino, $mensagem) {
    // Exemplo com Twilio (necessita instalação e configuração)
    /*
    require 'vendor/autoload.php';
    use Twilio\Rest\Client;
    
    $sid = 'SEU_ACCOUNT_SID';
    $token = 'SEU_AUTH_TOKEN';
    $twilio_number = 'SEU_NUMERO_TWILIO';
    
    $client = new Client($sid, $token);
    $client->messages->create(
        $telefone_destino,
        [
            'from' => $twilio_number,
            'body' => $mensagem
        ]
    );
    */
}
?>
