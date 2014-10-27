<?php
require_once 'formulario/classe/Conecta.php';
require_once 'formulario/classe/Usuario.php';

if (isset($_POST['cadastro']) && $_POST['cadastro']):
    extract($_POST);

    $cpf = preg_replace('/[^[:digit:]_]/', '', $cpf);
    $nascimento = "{$ano}-{$mes}-{$dia}";
    if ($dia == NULL && $mes == NULL && $ano == NULL) {
        $nascimento = '';
    }

    $user = new JUser();
    $user->name = $nome;
    $user->username = $cpf;
    $user->password = md5($senha1);
    $user->email = $email;
    $user->block = '0';
    $user->sendEmail = '0';
    $user->groups = array('2' => '2');
    
    $usuario = new Usuario();
    $usuario->setMatricula($matricula);
    $usuario->setNascimento($nascimento);
    $usuario->setEndereco($endereco);
    $usuario->setComplemento($complemento);
    $usuario->setEstado($estado);
    $usuario->setCidade($cidade);
    $usuario->setClube($clube);
    $usuario->setDelegado($delegado);
    $usuario->setCargo_clube($cargo_clube);
    $usuario->setQual_cc($outro_cargo_clube);
    $usuario->setCargo_distrito($cargo_distrito);
    $usuario->setQual_cd($outro_cargo_distrtito);
    $usuario->setCl_mj($cl_mj);
    $usuario->setPrefixo($prefixo);
    $usuario->setCamisa($camisa);
    
    $user->save();
    if(!$user->getError()):
        
        $usuario->setUser_id($user->id);
        $usuario->save();
        
        if($usuario->getError()):
            $erro = true;
            $msg = $usuario->getError();
        else:
            $erro = false;
            $msg = "Usuário Cadastrado com Sucesso.";
        endif;
        
    else:
        $erro = true;
        $msg = $user->getError();
        $_GET['cadastrar'] = '1';
    endif;

else:
    $erro = true;
    $msg = "Acesso Inválido.";
endif;
?>



<div id="system-message" style="text-align: center;">
    <dd class="<?php echo $erro ? 'error' : '' ?>">
        <ul>
            <li>
                <?php echo $msg ?>
            </li>
        </ul>
    </dd>
</div>


<?php 
var_dump($user);
var_dump($usuario)

?>


