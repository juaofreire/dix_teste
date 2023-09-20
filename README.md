# DIX

<p>Realizei com sucesso a implementação do Projeto, que inclui a criação do Gerenciamento de Usuários, um CRUD de Notícias com recursos de pesquisa, e uma restrição que permite que os usuários acessem apenas suas próprias notícias, garantindo segurança e privacidade dos dados.</p>

## Passo a Passo para Começar:

<strong>1. Clone o Repositório:</strong>

```bash
git clone https://github.com/juaofreire/dix_teste.git
```

<strong>2. Acesse o Diretório do Projeto:</strong>

```bash
cd dix_teste
```

<strong>3. Instale as Dependências:</strong>

- Para o npm:
```bash
npm install
```
- Para o Composer:
```bash
composer install
```

<strong>4. Copie o Arquivo .env:</strong>

```bash
cp .env.example .env
```

<strong>5. Gere uma Nova Chave do Laravel:<br></strong>

```bash
php artisan key:generate
```

<strong>6. Configure o Banco de Dados em .env (caso seja necessário):</strong>

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=White
DB_USERNAME=root
DB_PASSWORD=
```

<strong>7. Rode as Migrations para Criar o Banco de Dados (responda com 'yes' quando solicitado):</strong>

```bash
php artisan migrate
```

<strong>8. Alimente o Banco de Dados com o Usuário Padrão:</strong>

```bash
php artisan db:seed
```

<strong>9. Inicie o Servidor de Desenvolvimento:</strong>

```bash
php artisan serve
```

<strong>10. URL para Acesso ao Servidor de Desenvolvimento:</strong>

```bash
http://127.0.0.1:8000/
```

## Modelagem de Dados:

<strong>Para este projeto, muitas das tabelas já estavam prontas, sendo as únicas mudanças/novidades as seguintes:</strong>

<strong>1. Criação da tabela "news" conforme solicitado no teste:</strong>

- A tabela "news" possui os seguintes atributos: id, title, description, user_id, created_at e updated_at.
- O atributo "user_id" é uma chave estrangeira referenciando o "id" da tabela "users", sendo usado para identificar o criador da notícia.
- Cada notícia é associada a apenas um criador (usuário), enquanto um usuário pode criar várias notícias.

<strong>2. Criação do atributo "permission" como medida de segurança para o gerenciamento de usuários:</strong>

- Apenas o Administrador White (usuário padrão) possui a permissão de administrador (1), enquanto outros usuários criados terão permissão de usuário (0).
- A permissão de administrador permite a criação, edição (de nome e email ou de senha) e deleção de usuários na aba de gerenciamento de usuários.
- No momento atual, não há uma forma de dar permissão de administrador para outros usuários além da edição direta no banco.

![image](https://github.com/juaofreire/dix_teste/main/images/tables.png)

<strong></strong>
