---

# Loja Mágica Desafio

Olá, tudo bem?

Neste projeto, implementei diversos módulos para a gestão de clientes e pedidos mágicos. A seguir, apresento uma breve descrição dos módulos e instruções para rodar o projeto localmente.

---

## Módulos do Projeto

### 1. Importação de Clientes via CSV

Este módulo importa os clientes para o banco de dados a partir de uma planilha no formato CSV.

**Regras de Importação:**

- **Importação Condicional:**  
  Os dados serão importados apenas se **todos os campos obrigatórios** estiverem preenchidos. Registros com campos incompletos serão ignorados.

**Exemplos:**

- **Planilha CSV:**

  ![Planilha CSV](https://github.com/user-attachments/assets/3c376129-26b3-4047-aceb-6ea4bd001d29)

- **Mensagem de Importação:**  
  Ao finalizar o processo, uma mensagem informativa é exibida:

  ![Mensagem de Importação](https://github.com/user-attachments/assets/543aa15b-ad57-442d-a9ef-7101214cc189)

---

### 2. Cadastro Manual de Usuários e Pedidos

Desenvolvi um módulo para cadastrar usuários e pedidos manualmente, facilitando o cadastro direto sem a necessidade de uma planilha.

**Interface de Cadastro Manual:**

![Cadastro Manual de Usuários e Pedidos](https://github.com/user-attachments/assets/b0c03bf1-fcb5-48aa-a168-7fbb82519924)

---

### 3. Gestão de Clientes e Pedidos Mágicos

Criei um módulo completo para gerenciar os clientes e os pedidos mágicos. Nele, é possível visualizar, editar e excluir registros, tornando a administração da loja mais prática.

**Exemplos de Interface:**

- **Visualização dos Clientes e Pedidos:**

  ![Gestão de Clientes e Pedidos - Parte 1](https://github.com/user-attachments/assets/35d83315-d936-457e-9bbe-96c137d4ab10)

- **Edição e Exclusão:**

  ![Gestão de Clientes e Pedidos - Parte 2](https://github.com/user-attachments/assets/45bea797-05bf-425c-9855-2532bbf57c83)

---

## Como Rodar o Projeto Localmente

### Pré-Requisitos

- **PHP:**  
  Certifique-se de ter o PHP instalado na sua máquina. Você pode baixar a versão necessária em [php.net](https://www.php.net).

- **Banco de Dados:**  
  Crie as tabelas no banco de dados utilizando o script disponível no arquivo `db_loja_magica.sql`.  
  Atualize suas credenciais no arquivo `conexao.php` conforme sua configuração local.

### Iniciando o Servidor Local

O projeto utiliza o servidor embutido do PHP. Para iniciá-lo:

1. Abra o terminal na pasta do projeto.
2. Execute o comando:

   ```bash
   php -S localhost:8000
   ```

3. No seu navegador, acesse:

   ```
   http://localhost:8000
   ```

O projeto estará rodando e você poderá testá-lo localmente.

---

## Tecnologias Utilizadas

- **PHP:** Versão 7.3.9
- **Banco de Dados:** MySQL
- **Design:** Bootstrap 5
---


