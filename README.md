## Sobre o projeto

Plugin desenvolvido para Wordpress com a finalidade de exibir a previsão do tempo para a cidade atual, utilizando geolocalização para extrair a `latitude` e `longitude` do browser do usuário.

O plugin solicitará a permissão do usuário para acessar a sua localização atual, porém, caso o mesmo não permita, o plugin exibirá como padrão a previsão do tempo da cidade de `São Paulo`.

### Instalação

Para realizar a instalação do plugin, basta seguir os passos abaixo:

* Realizar o download do plugin [Openweathermap](http://rigotedesign.com.br/downloads/plugins/openweathermap.zip);
* Acesse o painel administrativo do seu site Wordpress e clique na opção `plugins`, em seguida clique em `Adicionar novo`;
* Na tela seguinte, clique em `Enviar plugin`, em seguida selecione o arquivo baixado `openweathermap.rar` e clique em `Instalar agora`;
* Feito isso, basta acessar a página de `plugins` e ativar o mesmo.

### Implementação

Para implementar o plugin em seu thema, basta incluir em suas páginas ou posts o shortcode `[weathermap]`, ao fazer isso, o plugin será exibido no local em que foi implementado o shortcode automaticamente.

![Shortcode](http://rigotedesign.com.br/downloads/plugins/shortcode.PNG)

Para implementar o plugin em uma área específica do código do seu thema ou site, basta utilizar o shortcode via PHP `<?php echo do_shortcode('[weathermap]'); ?>`, dessa forma o plugin será renderizado no local em que for implementado a tag.

![Shortcode no PHP](http://rigotedesign.com.br/downloads/plugins/shortcodePHP.PNG)

O resultado final deverá ser o apresentado abaixo:

![Openweathermap em exibição](http://rigotedesign.com.br/downloads/plugins/openweathermap.PNG)

### Personalização

É possível personalizar o plugin por completo, anterando imagens, CSS e até mesmo sua funcionalidade.
Os arquivos de imagens podem ser encontrados na pasta `images` do plugin, os ícones de tempo devem manter os mesmos nomes para que possam funcionar corretamente.