# Sorteio times

Sistema de sorteio de times.

Regra:

* Armazenar dados dos jogadores: Nome, nível (de 1 a 5, sendo 1 o pior e 5 o melhor) e se o jogador é goleiro(sim/não).
* Permitir ao usuário marcar quem confirmou presença.
* Definir o número de jogadores por time.
* Sortear os jogadores em pelo menos dois times, considerando a quantidade de jogadores definidos e os que foram marcados como
presentes.
* Quando houver mais de dois times completos, é permitido ao último time ficar com o número de jogadores menor do que aquele definido
pelo usuário.
* Não permitir que um time tenha um número maior de jogadores do que foi determinado pelo usuário antes do sorteio.
* Não permitir o sorteio, caso o número total de confirmados seja menor que Nj*2, sendo 'Nj' o número de jogadores por time (ex: para
um sorteio com 5 jogadores por time, o mínimo de confirmados deve ser 10).
* Não permitir mais de 1 goleiro no mesmo time.
* Considerar o nível dos jogadores ao executar o sorte

## Pré-requisitos

- Laravel 10.X

## Instalação

1. Clone este repositório:

    ```bash
    git clone https://github.com/GustavoRBS/sorteio-times.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd sorteio-time
    ```

3. Instale as dependências:

    ```bash
    composer update
    ```
    ```bash
    php artisan migrate
    ```
    ```bash
    php artisan serve
    ```

## Uso

O sistema foi concebido em três interfaces distintas: a primeira destinada ao registro de jogadores, a segunda à confirmação de presença e à definição do número de jogadores por equipe, e a última voltada para a exibição dos resultados do sorteio das equipes.

## Contato

Se você tiver alguma dúvida ou precisar entrar em contato, sinta-se à vontade para fazê-lo:

- **Nome:** Gustavo Ribeiro Bailon Silva
- **E-mail:** gu.bailon@hotmail.com

