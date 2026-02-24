FACULDADE GRAN (https://faculdade.grancursosonline.com.br/)
Projeto Disciplina Projeto Integrador

Link do projeto funcionando no replit:
https://projeto-integrador--diegogarciaS.replit.app

# 🏢 Gran ERP

Sistema ERP web desenvolvido inicialmente como projeto integrador da faculdade e atualmente em evolução para uma solução completa de gestão empresarial.

O objetivo do projeto é simular e implementar, na prática, os principais módulos utilizados em sistemas ERP reais, aplicando boas práticas de desenvolvimento, arquitetura e organização de software.

---

## 🚀 Status do Projeto

🟡 Em desenvolvimento ativo  
Este projeto está sendo continuamente aprimorado e novas funcionalidades estão sendo adicionadas.

---

## 🎯 Sobre o Projeto

O sistema nasceu como um projeto acadêmico com foco em:

- Cadastro de produtos
- Fornecedores
- Clientes

Com o avanço do desenvolvimento, o projeto evoluiu para um **ERP completo**, incorporando múltiplos módulos empresariais.

---

## 🧩 Módulos do Sistema

Atualmente o ERP conta com:

### 📋 Cadastros
- Clientes
- Fornecedores
- Produtos
- Funcionários
- Veículos

### 🏭 Produção
- Controle de processos produtivos
- Gestão de ordens de produção

### 💰 Vendas
- Emissão de pedidos
- Controle comercial

### 🧾 Fiscal
- Gestão tributária básica
- Preparação para emissão fiscal

### 💵 Financeiro
- Contas a pagar
- Contas a receber
- Fluxo de caixa

### 👥 Recursos Humanos
- Cadastro de funcionários
- Estrutura organizacional

### 🚚 Transporte
- Gestão de frota
- Controle logístico

---

## 🛠️ Tecnologias Utilizadas

- PHP
- Laravel
- Blade
- Bootstrap / TailwindCSS
- MySQL
- JavaScript
- Composer
- Artisan CLI

---

## ⚙️ Como Executar o Projeto

```bash
# Clonar repositório
git clone https://github.com/seu-usuario/seu-repo.git

# Instalar dependências
composer install

# Configurar ambiente
cp .env.example .env

# Gerar chave
php artisan key:generate

# Rodar migrations
php artisan migrate

# Iniciar servidor
php artisan serve
