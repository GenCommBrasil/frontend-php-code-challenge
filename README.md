## Instruções para Instalação do Plugin
Existem duas formas para instalar, segue as duas:

### Primeira Instrução:
1. Fazer o Download do Plugin neste link: [Plugin Teste Rakuten](https://drive.google.com/open?id=12aaMYTBFOUedWrrMAfycPp6bTrqzxV9z)
2. Wordpress no Dashboard ir em: `Plugins > Adicionar novo > Fazer Upload do Plugin > Instalar Agora > Ativar Plugin`.
3. Pronto!

### Segunda Instrução:
1. Fazer o Download do Plugin neste link: [Plugin Teste Rakuten](https://drive.google.com/open?id=12aaMYTBFOUedWrrMAfycPp6bTrqzxV9z)
2. Descompactar o arquivo ZIP no diretório do Wordpress: `wp-content/plugins/`
3. No Dashboard ir em: `Plugins > Plugins Instalados > "Teste Rakuten" > Ativar`

# Extras
Estou compartilhando o ambiente de desenvolvimento do Wordpress que fiz com o Docker, sei que não há a necessidade, mas serve para ter uma idéia de como eu desenvolvi esse teste :) Fiz no Linux Ubuntu, mas dá para usar no OSX ou Windows tranquilamente. Segue as instruções para rodar ele:

| Requisitos |
| ------ |
| [Git](https://git-scm.com/) |
| [Docker](https://www.docker.com/) | 
| [Docker Compose](https://docs.docker.com/compose/) |

### Instruções:
1. No terminal do Ubuntu, criar um diretório:
```
$ cd ~
$ mkdir rakuten
$ cd rakuten
```
2. Clonar o Repositório pode ser via SSH ou HTTPS, segue via SSH:
```
git clone git@github.com:alexsantossilva/frontend-php-code-challenge.git
```
3. Acessar o Projeto:
```
$ cd frontend-php-code-challenge 
```
4. Subir os Containers (vai fazer o download das imagens uma única vez, após isso vai levantar o container do Worpress e MySQL:
```
$ docker-composer up -d
```
5. Acessar o `localhost` no Browser realizar a instalação do Wordpress, agora só ativar o Plugin: `Plugins > Plugins Instalados > "Teste Rakuten" > Ativar`
6. Pronto!

_Feedbacks serão bem vindos. Obrigado!_
