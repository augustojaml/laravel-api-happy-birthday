# Laravel API with Sanctum Token

### Como Usar

- Criar o arquivo .env
- Modificar a variáveis de ambiente
- Executar composer update && npm install && php artisan key:generate && npm run dev
- lterar usuário em senha em : database/factories/UserFactory.php
- Executar php artisan migrate --seed

### private routes

- /v1/dashboard
- /v1/logout
- /v1/vouchers

### public routes

- /v1/login
- /v1/vouchers
