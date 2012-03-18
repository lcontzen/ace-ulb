<style type="text/css">
<!--
    table.page_header {width: 100%; border: none; background-color: #eeeeee; border-bottom: solid 0.5mm #000000; padding: 2mm }
    table.page_footer {width: 100%; border: none; background-color: #eeeeee; border-top: solid 0.5mm #000000; padding: 2mm}
    table.info_header{width: 100%; border: none; border-top: solid 0.1mm #000000; font-size: 7pt;  border-bottom: 0.6mm solid #000000;}
    table.conteudo{width: 100%;}
    
    
    table.conteudo{font-weight:normal; font-size:7pt;}
    table.conteudo th{font-weight:normal; border:0.2mm solid #000000;}
    table.conteudo td{font-weight:normal; border-bottom:0.1mm solid #dddddd; font-size:07pt; padding-right:20mm;}
    table.conteudo .titulo{background-color: #F6F6F6;}
    table.conteudo .titulo h2{font-size:9pt;}

-->
</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 7pt">
    
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width: 70%; text-align: left">
                   Movimento - Financiamento - Visualizar
                </td>
                
                <td style="width: 30%; text-align:right;">
                   gerado <?php echo date('d/m/Y H:i');?>
                </td>
            </tr>

        </table>
    </page_header>
    
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right">
                    page [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>


<!-- Início Informações do Header  -->

 <table class="info_header">
 
<tr>
<td style="width: 50%; text-align: left">Recebido em: <strong><?php echo $header['data']; ?></strong></td>
<td style="width: 50%; text-align: left">Nome: <strong><?php echo $header['nome']; ?></strong></td>
</tr>

<tr>
<td style="width: 50%; text-align: left">CPF/CNPJ: <strong><?php echo $header['cpf']; ?></strong></td>
<td style="width: 50%; text-align: left">E-mail: <strong><?php echo $header['email']; ?></strong></td>
</tr>
</table>

 <!-- Fim Informações do Header  -->

    <table class="conteudo">
    <tr>
        <td class="titulo" colspan="2"><h2>Dados Pessoais:</h2></td>
    </tr>
    
    <tbody>
            <tr>
                <th>Dados</th>
                <th>Valor</th>
            </tr>
        
        <?php foreach($etapa1 as $key1 => $value1): ?>
        <tr class="even_row">
        
            <td style="text-align:left;"><?php echo $key1; ?></td>
            <td><strong><?php echo $value1; ?></strong></td>
                
        </tr>
        <?php endforeach; ?>
    </tbody>
    
    </table>
    
</page>