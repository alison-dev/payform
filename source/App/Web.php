<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Source\App;

use \Source\Core\Controller;
use \Source\Models\Form;

/**
 * Description of Web
 *
 * @author Alison
 */
class Web extends Controller
{
    /**
     * Web constructor     * 
     */
    public function __construct() 
    {   
        //Habilita a e dá o caminho para trabalhar com templates 
        parent::__construct(__DIR__ . "/../../" . CONF_VIEW_FILES . "/");    
    }
    
    /**
     * SITE HOME
     * @return void
     */
    public function home(): void
    {
        //Coloca o arquivo register em tela (formulário)
        echo $this->view->render("formRegister", []);
    }  
    
    /**
     * @return void
     */
    public function register(array $data): void
    {
        //variável responsável por armazenar as mensagens de sucesso e de erros
        $message = "";
        
        //variável responsável por armazenar os dados a ser registrados
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        
        //valida os campos requisitados
        if(empty($data["name"]) || empty($data["email"]) || empty($data["desired_job_title"]) || empty($data["categories"]))
        {
            $message = "<p>Favor, digite todos os campos requisitados!</p>";
            //renderiza a tela de mensagens
            echo $this->view->render("formSuccess", [
                "message" => $message
            ]);
            return;
        }
        
        //Responsável por validar o formulário
        if(!csrf_verify($data))
        {
            $message = "<p>Erro ao enviar, favor use o formulário!</p>";
            //renderiza a tela de mensagens
            echo $this->view->render("formSuccess", [
                "message" => $message
            ]);
            return;
        }

        //limita o acesso de requisições do formulário para evitar possíveis invasões (bônus)
        if(request_limit("webregister", 3, 300))
        {
            $message = "<p>Você já efetuou 3 tentativas, esse é o limite. Por favor, aguarde 5 minutos para tentar novamente</p>";
            //renderiza a tela de mensagens
            echo $this->view->render("formSuccess", [
                "message" => $message
            ]);
            return;
        }
        
        //objeto que armazena os dados
        $formRegister = new Form();
        $formRegister->name = $data["name"];
        $formRegister->email = $data["email"];
        $formRegister->telephone = $data["telephone"];
        $formRegister->desired_job_title = $data["desired_job_title"];
        $formRegister->categories = $data["categories"];        
        $formRegister->comments = $data["comments"];
        $formRegister->userip = $_SERVER["REMOTE_ADDR"];        
         
        //caminho da pasta para armezenar o currículo
        $folder = __DIR__ . "../../../storage";
        
        //valida o caminho da pasta para saber se já existe ou se é um arquivo
        if(!file_exists($folder) || !is_dir($folder))
        {
            //cria a pasta
            mkdir($folder, 0755);
        }       
        
        //valida o arquivo para saber se o arquivo é maior que 1MB
        if($_FILES["curriculum"]["size"] >= 1000000)
        {
            $message = "<p>Arquivo maior que 1MB</p>";
            //renderiza a tela de mensagens
            echo $this->view->render("formSuccess", [
                "message" => $message
            ]);
            return;
        }
         
        //valida o arquivo para ver se está vazio 
        if($_FILES && !empty($_FILES["curriculum"]["name"]))
        {           
            //armazena o arquivo
            $fileUpload = $_FILES["curriculum"];
             
            //variável responsável para comparar com o arquivo enviado se é o correto a ser enviado
            $allowedTypes = [
                "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                "application/pdf",
                "application/msword"
            ];
             
            //renomeia o arquivo
            $newFileName = time() . mb_strstr($fileUpload["name"], ".");
            
            //compara os arquivos requisitados
            if(in_array($fileUpload["type"], $allowedTypes))
            {
                //move o arquivo para pasta
                if(move_uploaded_file($fileUpload["tmp_name"], $folder . "/{$newFileName}"))
                {
                    //nome do arquivo a ser registrado no banco
                    $formRegister->curriculum = $newFileName;
                }else
                {
                    $message = "<p>Erro inesperado!</p>";
                    //renderiza a tela de mensagens
                    echo $this->view->render("formSuccess", [
                        "message" => $message
                    ]);
                    return;
                }
            }else
            {
                $message = "<p>Tipo de arquivo não permitido!</p>";
                //renderiza a tela de mensagens
                echo $this->view->render("formSuccess", [
                    "message" => $message
                ]);
            }                      
            
            //disparo do e-mail dos dados do formulário (Os e-mails são enviados para o e-mail que foi configurado no arquivo config.php na constante CONF_MAIL_SUPPORT)
            if((new \Source\Support\Email())->bootstrap(
                "Notificação de cadastro", "O cadastro de <b>" . $formRegister->name . "</b> foi realizado com sucesso!"
                . " <p>Confira aqui os dados:</br>"
                . "Email: " . $formRegister->email . "</br>" . "Telefone: " . $formRegister->telephone 
                ."</br>" . "Cargo Desejado: " . $formRegister->desired_job_title . "</br>" 
                . "Escolaridade: " . $formRegister->categories . "</br>" . "Observações: " . $formRegister->comments . "</br>" 
                . "IP do usuário: " . $formRegister->userip . "</p>", CONF_MAIL_SUPPORT, "Suporte " 
                . CONF_SITE_NAME)->send($formRegister->email, $formRegister->name))
            {
                $message = "<p>Cadastro e e-mail efetuado com sucesso!</p>";
            }
            
            //validação de registro no banco de dados
            if(!$formRegister->save())
            {
                $message = "<p>Erro ao cadastrar!</p>";
                //renderiza a tela de mensagens
                echo $this->view->render("formSuccess", [
                    "message" => $message
                ]);
                return;
            } 
            
            //renderiza a tela de mensagens
            echo $this->view->render("formSuccess", [
                "message" => $message
            ]);
        }
    }         
}
