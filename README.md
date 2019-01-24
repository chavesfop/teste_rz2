# Prova Técnica para o Cargo de Programador Web

## Descição do Problema
Construa um sistema em PHP para análise de dados, onde o mesmo deverá permitir:  
 - Importar arquivos de texto
 - ler e analisar os dados dos arquivos
 - gerar um relatorio

## Orientações
Deve existir 3 tipos de entidades dentro desses arquivos, onde para cada tipo temos um layout diferente, são eles:  

Entidade | ID | Formato
--- | --- | ---
Salesman | 001 | 001,CPF,Name,Salary
Customer | 002 | 002,CNPJ,Name, Business Area
Sales | 003 | 003,Sale ID,[Item ID-Item Quantity-Item Price],Salesman ID*

*observe no formato a lista de itens estruturado por colchetes

## Exemplo de dados das entidades (apenas um exemplo)

```
001,1234567891234,Steve,80000
001,3245678865434,Elias,60000.99
002,2345675434544345,Rita Ruggs,Rural
002,2345675433444345,Dianne Bragg,Rural
003,10,[1­10­100, 2­30­2. 50, 3­40­3. 10] ,Steve
003,08,[1­34­10, 2­33­1. 50, 3­40­0. 10] ,Elias
```

## Processamento dos dados
O sistema deve ler somente arquivos com extensão `.dat`, localizados em um diretório, localizado em `data/in`. Depois de processados, o sistema deve gerar um arquivo de saída seguindo o formato `{file_name}.done.dat` em outro diretório, localizado em `data/out`.

## Resultado
O arquivo processado deve apresentar como resultados a quantidade de clientes e de vendedores informados na entrada, a média salarial dos vendedores, o ID da venda masis cara, bem como o pior vendedor.

*IMPORTANTE:* Você poderá usar qualquer programa no desenvolvimento da prova, bem como escolher qualquer biblioteca externa se precisar. Os critérios de avaliação que usaremos para avaliar seu teste serão a lógica de programação, clean code e código otimizado.

## Notas do desenvolvedor
Adicione arquivos no formato em `data/in`, aceita apenas arquivos com extensões `.dat`.  
Verifique as permissões de acesso da pasta `data/out`, o usuário que executar o código deve ter permissão de escrita.  
O código foi testado em ambiente `Linux`, com PHP versão `7.2.10`, mas acredito que funcione em qualquer versão do PHP acima de `5`.  
O arquivo principal é o `processador.php` que pode ser executado em linha de comando como: `php processador.php`.

Foram criado classes para cada tipo de objeto para exemplificar o uso de Orientação a Objetos neste projeto.  
A manipulação de arquivos ficou por conta de `processador.php`, e sempre que executado o arquivo no diretório `out` é sobreescrito.
