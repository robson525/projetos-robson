<?php
    if(!isset($user) || !in_array(13, $user->groups)):
        $erro = true;
        $msg = "Erro 1 -Você não tem permissão para acessar esta área.";
    else:
        $convencao_id = (int) $_GET['gerenciar'];
        $convencao = Convencao::getById($convencao_id);
        if(!$convencao || !$convencao->getAberta()):
            $erro = true;
            $msg = "Erro 2 - Você não tem permissão para acessar esta área.";
        
        else:
            
            $inscricoes = InscricaoConvencao::getInscricoesGerencia($convencao_id);
            
        endif;      
    endif;
?>

<?php if(isset($msg)): ?>
    <div id="system-message" style="text-align: center;">
        <dd class="<?php echo $erro ? 'error' : '' ?>">
            <ul>
                <li>
                    <?php echo $msg ?>
                </li>
            </ul>
        </dd>
    </div>
<?php endif; ?>


<?php if(isset($inscricoes)): ?>
    
    <table>
        <tr>
            <th>Nome</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Cluble</th>
            <th>Pago</th>
        </tr>
    </table>

<?php endif; ?>
