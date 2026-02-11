# 🚀 GUIA DE INSTALAÇÃO - CONSULTORIA E.M
## Passo a Passo Completo para Hospedar o Seu Website

---

## 📦 OPÇÃO 1: HOSPEDAGEM COMPARTILHADA (Recomendado para Iniciantes)

### Passo 1: Escolher e Contratar Hospedagem

**Serviços Recomendados para Angola:**
1. **HostGator** - www.hostgator.com
2. **Bluehost** - www.bluehost.com  
3. **Hostinger** - www.hostinger.pt
4. **GoDaddy** - www.godaddy.com

**O que procurar:**
- ✅ Suporte PHP e MySQL
- ✅ cPanel incluído
- ✅ Certificado SSL grátis
- ✅ Domínio grátis (alguns planos)
- ✅ Email profissional incluído

**Custo aproximado:** $3-10 USD/mês

---

### Passo 2: Aceder ao cPanel

1. Após contratar, receberá um email com:
   - URL do cPanel (ex: seusite.com/cpanel)
   - Nome de utilizador
   - Senha

2. Faça login no cPanel

---

### Passo 3: Upload dos Ficheiros

**Método A: Gestor de Ficheiros (File Manager)**

1. No cPanel, clique em "Gestor de Ficheiros" ou "File Manager"
2. Navegue até a pasta `public_html`
3. Clique em "Upload" (topo da página)
4. Selecione TODOS os ficheiros deste pacote
5. Aguarde o upload completar
6. Verifique se a estrutura de pastas está correta:
   ```
   public_html/
   ├── index.html
   ├── css/
   ├── js/
   ├── assets/
   ├── .htaccess
   └── robots.txt
   ```

**Método B: FTP (Mais Rápido para muitos arquivos)**

1. Baixe um cliente FTP: **FileZilla** (grátis)
2. No cPanel, procure "Contas FTP" ou "FTP Accounts"
3. Use as credenciais para conectar:
   - Host: ftp.seudominio.com (ou IP do servidor)
   - Utilizador: seu_usuario
   - Senha: sua_senha
   - Porta: 21
4. Arraste todos os ficheiros para `public_html`

---

### Passo 4: Configurar Domínio

**Se já tem domínio:**
1. Aceda ao painel onde comprou o domínio
2. Encontre "DNS Settings" ou "Nameservers"
3. Altere para os nameservers da hospedagem (fornecidos por email)
4. Aguarde 24-48h para propagação

**Se não tem domínio:**
- Use o domínio temporário fornecido pela hospedagem
- Ou registe um novo domínio

---

### Passo 5: Ativar SSL/HTTPS (Segurança)

1. No cPanel, procure "SSL/TLS Status" ou "Let's Encrypt SSL"
2. Clique em "Ativar SSL" ou "Install SSL"
3. Selecione seu domínio
4. Aguarde a instalação (1-5 minutos)
5. No arquivo `.htaccess`, descomente as linhas de redirecionamento HTTPS

---

### Passo 6: Configurar Email Profissional

1. No cPanel, clique em "Contas de Email" ou "Email Accounts"
2. Crie: geralemmconsultoria@seudominio.com
3. Defina uma senha forte
4. Configure no Gmail, Outlook ou outro cliente de email

**Configuração IMAP:**
- Servidor de entrada: mail.seudominio.com
- Porta: 993 (SSL)
- Servidor de saída: mail.seudominio.com  
- Porta: 465 (SSL)

---

### Passo 7: Ativar Formulário de Contacto

**Opção A: Usar PHP (Incluído no pacote)**

1. O arquivo `send-email.php` já está incluído
2. Edite `js/main.js`, encontre a função `appointmentForm` e altere para:
```javascript
fetch('send-email.php', {
    method: 'POST',
    body: formData
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        showSuccessModal(data);
    } else {
        showErrorModal(data.message);
    }
})
.catch(error => {
    showErrorModal('Erro ao enviar. Tente novamente.');
});
```

**Opção B: Usar Formspree (Mais Fácil)**

1. Vá a www.formspree.io
2. Crie conta grátis
3. Crie um novo formulário
4. Copie o URL fornecido
5. No `index.html`, adicione ao `<form>`:
   ```html
   <form id="appointmentForm" action="https://formspree.io/f/SEU_ID" method="POST">
   ```

---

## 📱 PASSO 8: Testes Finais

### Checklist de Testes:

- [ ] Site abre em: https://seudominio.com
- [ ] Todas as imagens carregam
- [ ] Menu de navegação funciona
- [ ] Links internos funcionam (scroll suave)
- [ ] Formulário envia email
- [ ] Site responsivo (teste no telemóvel)
- [ ] Blog carrega artigos
- [ ] FAQ abre/fecha corretamente
- [ ] Nenhum erro no console (F12 no navegador)

### Testar Velocidade:
1. Google PageSpeed Insights: https://pagespeed.web.dev
2. GTmetrix: https://gtmetrix.com
3. Meta: >90 pontos no Google

---

## 🔍 PASSO 9: SEO e Visibilidade

### Google Search Console:
1. Vá a: https://search.google.com/search-console
2. Adicione seu site
3. Verifique propriedade
4. Envie o sitemap.xml

### Google Analytics (Opcional):
1. Crie conta em: https://analytics.google.com
2. Adicione o código de tracking no `<head>` do index.html

### Google My Business:
1. Registe seu negócio: https://business.google.com
2. Adicione localização, horários, fotos
3. Link para o website

---

## 📧 PASSO 10: Emails Automatizados (Avançado)

Para notificações automáticas por SMS/WhatsApp:

### Integração WhatsApp Business API:
- **Twilio**: www.twilio.com/whatsapp
- **MessageBird**: www.messagebird.com

### Integração SMS:
- **Twilio**: www.twilio.com/sms
- **Nexmo/Vonage**: www.vonage.com

---

## ⚠️ PROBLEMAS COMUNS E SOLUÇÕES

### Problema: Site não abre
✅ **Solução:** 
- Verifique se o domínio está a apontar corretamente
- Aguarde 24-48h para propagação DNS
- Limpe cache do navegador (Ctrl+Shift+Delete)

### Problema: Imagens não aparecem
✅ **Solução:**
- Verifique se a pasta `assets/` foi carregada
- Confirme permissões das pastas (755)
- Verifique URLs das imagens no código

### Problema: Formulário não envia
✅ **Solução:**
- Teste se PHP está ativo (crie arquivo test.php: `<?php phpinfo(); ?>`)
- Verifique se o email está configurado corretamente
- Use Formspree como alternativa

### Problema: Site lento
✅ **Solução:**
- Otimize imagens (use TinyPNG.com)
- Ative cache no .htaccess
- Use CDN (Cloudflare grátis)

### Problema: SSL não funciona
✅ **Solução:**
- Aguarde 5-10 minutos após instalação
- Force renovação no cPanel
- Contacte suporte da hospedagem

---

## 📞 SUPORTE

**Precisa de ajuda?**
- Email: geralemmconsultoria@gmail.com
- Telefone: +244 934 465 141
- WhatsApp: https://wa.me/244934465141

**Suporte da Hospedagem:**
- Todas as empresas de hospedagem têm chat ao vivo 24/7
- Use sempre em inglês ou português conforme disponível

---

## 🎉 PARABÉNS!

O seu site está agora ao vivo! 🚀

### Próximos Passos:
1. ✅ Partilhe o link nas redes sociais
2. ✅ Adicione o link no Google My Business
3. ✅ Crie conteúdo regular no blog
4. ✅ Monitorize visitas com Google Analytics
5. ✅ Recolha feedback dos clientes
6. ✅ Faça backups mensais

**Boa sorte com o seu negócio online! 💼**
