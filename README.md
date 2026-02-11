# Consultoria E.M - Website

## 📋 Conteúdo do Pacote

Este pacote contém todos os arquivos necessários para hospedar o website da Consultoria E.M.

### Estrutura de Arquivos:
```
website-hospedagem/
├── index.html          # Página principal
├── css/
│   └── styles.css      # Estilos do site
├── js/
│   └── main.js         # JavaScript e funcionalidades
├── assets/             # Pasta para imagens e recursos
├── .htaccess           # Configuração do servidor Apache
└── robots.txt          # Configuração para motores de busca
```

## 🚀 Como Hospedar

### Opção 1: Hospedagem Shared (Recomendado para começar)

1. **Escolha um serviço de hospedagem:**
   - HostGator
   - Bluehost
   - GoDaddy
   - SiteGround
   - Hostinger

2. **Upload dos arquivos:**
   - Acesse o cPanel da sua hospedagem
   - Abra o Gestor de Ficheiros (File Manager)
   - Navegue até a pasta `public_html`
   - Faça upload de TODOS os arquivos deste pacote
   - Mantenha a estrutura de pastas intacta

3. **Configuração do domínio:**
   - Se já tiver um domínio, aponte-o para o servidor
   - Se não, pode usar o domínio temporário fornecido pela hospedagem

### Opção 2: Hospedagem VPS/Dedicado

1. **Requisitos mínimos:**
   - Apache 2.4+ ou Nginx
   - PHP 7.4+ (opcional, apenas para funcionalidades backend futuras)
   - SSL/HTTPS (recomendado)

2. **Configuração:**
   - Faça upload via FTP/SFTP ou Git
   - Configure o Apache/Nginx para servir a pasta `public_html`
   - Instale certificado SSL (Let's Encrypt grátis)

## 🔧 Configurações Importantes

### 1. Ativar HTTPS
Após obter certificado SSL, descomente as linhas no arquivo `.htaccess`:
```apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### 2. Atualizar Domínio
No arquivo `.htaccess`, substitua `seusite.com` pelo seu domínio real.

### 3. Adicionar Favicon
Coloque o arquivo `favicon.png` ou `favicon.ico` na pasta `assets/`

### 4. Google Analytics (Opcional)
Adicione o código do Google Analytics no `<head>` do `index.html`

### 5. Configurar Email do Formulário
Atualmente o formulário está simulado. Para funcionar de verdade:
- Integre com um serviço de email (SendGrid, Mailgun, etc.)
- Ou use um backend PHP para processar os formulários
- Ou use serviços como Formspree ou EmailJS

## 📧 Integração de Email do Formulário

### Opção A: PHP Simples
Crie um arquivo `send-email.php`:
```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $mensagem = $_POST['mensagem'];
    
    $to = "geralemmconsultoria@gmail.com";
    $subject = "Nova Reunião Agendada - " . $nome;
    $body = "Nome: $nome\nEmail: $email\nTelefone: $telefone\nServiço: $servico\nData: $data\nHora: $hora\n\nMensagem:\n$mensagem";
    
    mail($to, $subject, $body);
    echo json_encode(['success' => true]);
}
?>
```

### Opção B: Serviços Externos (Mais Fácil)
- **Formspree**: https://formspree.io
- **EmailJS**: https://www.emailjs.com
- **Zapier**: https://zapier.com

## 🎨 Personalização

### Cores
Edite as variáveis CSS em `css/styles.css`:
```css
:root {
    --primary: #1a4d2e;        /* Verde principal */
    --accent: #d4af37;         /* Dourado */
    --dark: #0f1419;           /* Escuro */
}
```

### Conteúdo do Blog
Edite o array `blogPosts` em `js/main.js`

### Informações de Contacto
Atualize em:
- `index.html` (seção de contacto)
- Rodapé (footer)

## 📱 Teste

Antes de lançar, teste:
- [ ] Todas as páginas carregam corretamente
- [ ] Links internos funcionam
- [ ] Formulário de contacto funciona
- [ ] Site é responsivo (mobile, tablet, desktop)
- [ ] Velocidade de carregamento (use PageSpeed Insights)
- [ ] Certificado SSL está ativo
- [ ] Site aparece no Google

## 🔍 SEO

Para melhor posicionamento:
1. Crie um sitemap.xml
2. Registe no Google Search Console
3. Registe no Bing Webmaster Tools
4. Adicione meta descrições
5. Otimize imagens (use WebP quando possível)

## 📞 Suporte

Para dúvidas sobre hospedagem:
- Email: geralemmconsultoria@gmail.com
- Telefone: +244 934 465 141

## ✅ Checklist Final

Antes de lançar:
- [ ] Todos os ficheiros foram carregados
- [ ] SSL está configurado e funcionando
- [ ] Domínio está a apontar corretamente
- [ ] Formulário de contacto testado
- [ ] Site testado em diferentes dispositivos
- [ ] Backup dos ficheiros criado
- [ ] Google Analytics configurado (se desejado)
- [ ] Favicon adicionado
- [ ] Informações de contacto verificadas

## 🎉 Pronto!

O seu site está pronto para ser lançado! Boa sorte! 🚀
