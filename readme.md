<center><h1>Projeto Geolocalização unisa.</h1></center>

* Versão PHP 7.2
* Laravel Framework 5.8
* Vue 2.5
* MySql 5.7
 
## *Ferramentas...*
* composer
* node
* npm
* banco de dados mysql
* git

## *Instalação* 

Primeiro passo, clonar o projeto:
``` bash
# Clonar
git clone https://github.com/lecastro/unisa-map-google.git

# Acessar
cd unisa-map-google
```
## Configuração - Backend

``` bash
# Instalar dependências do projeto
composer install

# Configurar variáveis de ambiente
cp .env.example .env
php artisan key:generate

# Configurar banco de dados
php artisan migrate 

# Essa comando manda uma lista de endereços para api do google maps e atualiza os campos latitude e longitude

geomaps:cadastrar
```

## Configuração - Frontend
``` bash
# Atualizar dependências
npm install

# Rodar em ambiente local localhost:8080
npm run dev

# Rodar em ambiente de produção
npm run build
```
## *Descrição do projeto...*

## *Back-end*
<p>
Pegar do banco pré cadastrado, endereços do funcionarios da unisa manda para api do google atualizando com um novos valores a latitude, e longitude no banco de dados retornando json para vuejs.
</p>

## *Front-end*
<p>
Renderizar um mapa do google onde existe 4 polos fixos da unisa. Recebendo lat e lng do banck-end e renderizado markers.
</p>
