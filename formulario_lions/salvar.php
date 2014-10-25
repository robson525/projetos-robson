<?php
    
    require_once 'formulario/classe/Conecta.php';
    require_once 'formulario/classe/Usuario.php';

    extract($_POST);
    
    $cpf = preg_replace('/[^[:digit:]_]/', '', $cpf);
    $nascimento = "{$ano}-{$mes}-{$dia}";
    if($dia==NULL && $mes==NULL && $ano==NULL){ $nascimento = '';} 
    
    $user = new JUser();
    $user->name = $nome;
    $user->username = $cpf;
    $user->password = md5($senha1);
    $user->email = $email;
    $user->block = '0';
    $user->sendEmail = '0';
    $user->groups = array('2'=>'2');
    
    
    $usuario = new Usuario();
    $usuario->setUser_id($user->id);
    $usuario->setNome($nome);
    $usuario->setMatricula($matricula);
    $usuario->setCpf($cpf);
    $usuario->setEmail($email);
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
    
    $usuario->save();
    
    var_dump($user);
    
    var_dump($_POST);
    
?>



    <div id="system-message">
        <dd class="error">
            <ul>
                <li>
                    Robson
                </li>
            </ul>
        </dd>
    </div>

