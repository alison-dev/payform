<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Source\Support;
use \CoffeeCode\Optimizer\Optimizer;
/**
 * Description of Seo
 *
 * @author Alison
 */
class Seo 
{
    /**
     * @var Optimizer 
     */
    protected $optimizer;
    
    /**
     * @param string $schema
     */
    public function __construct(string $schema = "article") 
    {
        $this->optimizer = new Optimizer();
        $this->optimizer->openGraph(
            CONF_SITE_NAME,
            CONF_SITE_LANG,
            $schema
        )->twitterCard(CONF_SOCIAL_TWITTER_CREATOR, CONF_SOCIAL_TWITTER_PUBLISHER, CONF_SITE_DOMAIN)->publisher(CONF_SOCIAL_FACEBOOK_PAGE, CONF_SOCIAL_FACEBOOK_AUTHOR)->facebook(CONF_SOCIAL_FACEBOOK_APP);
    }
    
    /**
     * @param type $name
     * @return type
     */
    public function __get($name)
    {
        return $this->optimizer->data()->$name;
    }
    
    /**
     * @param string $title
     * @param string $description
     * @param string $url
     * @param string $image
     * @param bool $follow
     * @return string
     */
    public function render(string $title, string $description, string $url, string $image, bool $follow = true): string
    {
        return $this->optimizer->optimize($title, $description, $url, $image, $follow)->render();
    }
    
    /**
     * @return Optimizer
     */
    public function optimizer(): Optimizer
    {
        return $this->optimizer;
    }
    
    /**
     * @param string $title
     * @param string $desc
     * @param string $url
     * @param string $image
     * @return type
     */
    public function data(string $title = null, string $desc = null, string $url = null, string $image = null)
    {
        return $this->optimizer->data($title, $desc, $url, $image);
    }
}
