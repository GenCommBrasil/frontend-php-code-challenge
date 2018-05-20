<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wordpress');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[5,:.i PwjTjqOX]I#W1WW?8~cTl1;.(naKEXNYm,BRu9^,4wN!*JPWMbc|EGZ22');
define('SECURE_AUTH_KEY',  'V[`SrE.1vpJOw)^=n|bLmxvJ!_(%fB?964+dPEu BnUdr]hJB`c_uxs&DPY|&5+-');
define('LOGGED_IN_KEY',    'hPP,!Celt}`>td2XxK&TJY#SjY.?rtCPL~q)g[g;YJ75k-84?gp27Zbq4~Y&v zl');
define('NONCE_KEY',        ',N!8n-~|zZYz~W..tY4:M$#|-!dmT=9&9-jF[mIQr:%@>nTi,p)iPO}EGJPVE6?(');
define('AUTH_SALT',        '@Pn`ZdN=|4$2eA6$$c p%PjB.,ry6Dj6{Vl!3yz}Bgc]J*ih8}$-6-z$%-n;c4Qc');
define('SECURE_AUTH_SALT', '>U(,em_BFI@Qjn<z9,q)(5t$LFK2&WG>jB<`6or_{Uq)[^AU<[X-5aP 6=nbgpHE');
define('LOGGED_IN_SALT',   '1fr:gSoh@Nh/br)QvPX#vFrt=R=Q4O0KRL[R%Vy5qa}cNz=hgrSDLCfVL:m[c92d');
define('NONCE_SALT',       'kk}9Iw`$MoTe3L7aM7^DA}+brJDNJ>_+L^DDRDe:q9L]VF@QuN:z2i XW9Q)p;? ');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
