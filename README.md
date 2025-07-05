# 💻 Focus Sync Hub

**Focus Sync Hub** é um painel digital desenvolvido como projeto acadêmico com o objetivo de auxiliar pessoas na **organização de tarefas**, na **gestão do tempo com Técnica Pomodoro**, e no uso de **ambientes sonoros e audiovisuais** para melhorar o foco e a produtividade — especialmente útil para pessoas com **TDAH** e dificuldades de concentração.

# 📄 Artigo Acadêmico
Este projeto foi desenvolvido como parte de um estudo voltado ao uso de ferramentas digitais de apoio ao foco e organização para pessoas com TDAH.

**Paper Kezia Cotta**  
🔬 *FOCUS SYNC HUB: um painel digital para organização de tarefas, foco e produtividade*

📎 [Acesse o paper completo no Google Docs](https://docs.google.com/document/d/1AS01UVlIsTRrb10T52mU-k3z_ILWe0Aq/edit?usp=sharing&ouid=109034901452232598237&rtpof=true&sd=true)


🤝 Autoria
Desenvolvido por Kezia Cotta como projeto acadêmico.
Contribuições, sugestões e feedbacks são muito bem-vindos! 

📜 Licença
Este projeto é de uso acadêmico e pessoal. Para uso comercial, entre em contato.

---

## ✨ Funcionalidades

- ✅ Lista de tarefas com:
  - Adição de novas tarefas
  - Marcar como concluída (com riscado automático)
  - Edição e exclusão com AJAX (sem recarregar a página)
- ⏱️ **Cronômetro Pomodoro** com três modos:
  - Pomodoro (25 min)
  - Pausa Curta (5 min)
  - Pausa Longa (10 min)
- 🎧 Player de vídeo do YouTube integrado (ex: ruído marrom, lofi, etc.)
- 💻 Interface web responsiva, moderna e leve
- 🔐 Backend com PHP + MySQL (utiliza PDO)

---

## 📚 Tecnologias utilizadas

|            Frontend |      Backend | Banco de Dados |
|---------------------|--------------|----------------|
| HTML5 + CSS3 + JS (jQuery) | PHP 8 | MySQL (via XAMPP) |

---

## 🧩 Estrutura de pastas

FocusSync-Hub/
├── index.php
├── /actions
│   ├── create.php
│   ├── update.php
│   └── update-progress.php
├── /database
│   └── conn.php
├── /src
│   ├── /styles
│   │   ├── style-general.css
│   │   ├── style-tasks.css
│   │   └── style-pomodoro.css
│   ├── /javascript
│   │   ├── script-tasks.js
│   │   └── script-pomodoro.js
│   └── /images
│       └── fundo.png

