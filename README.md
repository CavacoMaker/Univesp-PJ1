## Sequencia para criar o projeto

Criar o projeto em Laravel.
```
composer create-project laravel/laravel . (obs: tem que ter o composer e o php instalados e reconhecidos pelo code)
```

Instalar o Brezze.
```
composer require laravel/breeze --dev (obs: isso serve para criar o sistema de login)
```

Publicar a autenticação, rotas, controladores e outros recursos para a aplicação
```
php artisan breeze:install
```

* Selecionar React com Breeze, digitar "React" 
* Selecionar recurso opcional, digitar "dark" 
* Selecionar framework para teste, digitar "1" 

Executar as migrations para criar a base de dados e as tabelas, (precisa mexer no .env antes e salvar as modificações feitas nele)
```
php artisan migrate 
```

instalar as dependências do Node.js
```
npm install
```

Executar as bibliotecas Node.js
```
npm run dev
```

Iniciar o projeto criado com o laravel
```
php artisan serve
```

Acessar no navegador:
```
http://127.0.0.1:8000
```

Criar seed. (as seeders ficam em Database -> Seeders)
```
php artisan make:seeder UserSeeder
```

Cadastrar registro de teste.
```
php artisan db:seed
```

Instalar o criador de PDF.
```
composer require barryvdh/laravel-dompdf
```

Limpar cache.
```
php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```