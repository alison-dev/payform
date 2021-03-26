<?php
/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "paytour");

/**
 * SITE
 */
define("CONF_SITE_NAME", "CaféControl");
define("CONF_SITE_TITLE", "Gerencie suas contas com o melhor Café");
define("CONF_SITE_DESC", "O CafeControl é um gerenciador de contas simples, poderoso e gratuito. O prazer de tomar um café e ter o controle total de suas contas.");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "xfactoryapp.com.br");
define("CONF_SITE_ADDR_STREET", "Rua: Amsterdan");
define("CONF_SITE_ADDR_NUMBER", "271");
define("CONF_SITE_ADDR_COMPLEMENT", "Nenhum");
define("CONF_SITE_ADDR_CITY", "Franco da Rocha");
define("CONF_SITE_ADDR_NEIGHBORHOOD", "Parque Vitória");
define("CONF_SITE_ADDR_STATE", "SP");
define("CONF_SITE_ADDR_ZIPCODE", "07854-080");

/**
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "@Alison62975665");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@Alison62975665");
define("CONF_SOCIAL_FACEBOOK_APP", "1738698949610440");
define("CONF_SOCIAL_FACEBOOK_PAGE", "Xfactoryapp");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "alisondevofc");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "alison.souza.779");
define("CONF_SOCIAL_YOUTUBE_CHANNEL", "xfactoryapp");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "https://www.cafecontrol.com.br");
define("CONF_URL_TEST", "https://www.localhost/paytour");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../assets/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_FILES", "file");

/**
 * MAIL
 */
define("CONF_MAIL_HOST", "smtp.sendgrid.net");
define("CONF_MAIL_PORT", "587");
define("CONF_MAIL_USER", "apikey");
define("CONF_MAIL_PASS", "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");
define("CONF_MAIL_SENDER", ["name" => "Alison de Souza", "address" => "alisonfco@hotmail.com"]);
define("CONF_MAIL_SUPPORT", "alisonfco@hotmail.com");
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");


