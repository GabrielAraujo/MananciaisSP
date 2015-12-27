<?php
    /* This PHP is used to get the information form SABESP website because they do not provide a webservice. */
    /* Este PHP é usado para pegar as informacoes do site de SABESP já que eles não disponibilizam webservice. */
	function get_string_between($string, $start, $end){
    	$string = ' ' . $string;
   	    $ini = strpos($string, $start);
   	    if ($ini == 0) return ''; 
   	    $ini += strlen($start); 
   	    $len = strpos($string, $end, $ini) - $ini;
   	    return substr($string, $ini, $len);
	}

	$curlSession = curl_init();
    	curl_setopt($curlSession, CURLOPT_URL, 'http://www2.sabesp.com.br/mananciais/DivulgacaoSiteSabesp.aspx');
    	curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    	curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    	$sabespHTML= curl_exec($curlSession);
    	curl_close($curlSession);

	$table = get_string_between($sabespHTML, '<table id="tabDados"', '</table>');
	
	/* !!!!!!!!!CANTAREIRA!!!!!!!!! */
	/* Remove 1st TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
    $tr = '<tr'.$tr.'</tr>';
	$table = str_replace($tr,'',$table);

	/* GET the indices in 2nd tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$cantI1 = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '1:', '%')));
	$cantI2 = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '2:', '%')));
	$cantI3 = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '3:', '%')));

	/* Remove 2nd TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = str_replace($tr,'',$table);
    
	/* GET the indice in 3rd tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$cantPlDia = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 3rd TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);
	
	/* GET the indice in 4th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$cantPlAcMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 4th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 5th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$cantMdHistMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 5th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* Remove 6th TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* !!!!!!!!!ALTO TIETE!!!!!!!!! */
	/* Remove 7th TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 8th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$altInd = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', '%</td>')));

	/* Remove 8th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 9th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$altPlDia = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 9th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 10th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$altPlAcMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 10th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 11th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$altMdHistMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 11th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* Remove 12th TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* !!!!!!!!!GUARAPIRANGA!!!!!!!!! */
	/* Remove 13th TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 14th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$guaInd = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', '%</td>')));

	/* Remove 14th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 15th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$guaPlDia = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 15th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 16th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$guaPlAcMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 16th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 17th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$guaMdHistMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 17th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* Remove 18th TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* !!!!!!!!!ALTO COTIA!!!!!!!!! */
	/* Remove 19th TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 20th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$alcInd = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', '%</td>')));

	/* Remove 20th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 21th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$alcPlDia = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 21th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 22th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$alcPlAcMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 22th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 23th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$alcMdHistMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 23th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* Remove 24th TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* !!!!!!!!!RIO GRANDE!!!!!!!!! */
	/* Remove 25th TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 26th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$rigInd = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', '%</td>')));

	/* Remove 26th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 27th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$rigPlDia = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 27th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 28th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$rigPlAcMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 28th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 29th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$rigMdHistMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 29th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* Remove 30th TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);
	
	/*  !!!!!!!!!RIO CLARO!!!!!!!!! */
	/* Remove 31th TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 32th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$ricInd = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', '%</td>')));

	/* Remove 32th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 33th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$ricPlDia = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 33th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 34th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$ricPlAcMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 34th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* GET the indice in 35th tr */
	$tr = get_string_between($table, '<tr', '</tr>');
	$ricMdHistMes = (float) str_replace(',', '.', str_replace(' ', '', get_string_between($tr, '<td class="guardaImgBgDetalhe" width="88">', 'mm</td>')));

	/* Remove 35th TR of table */
    $tr = '<tr'.$tr.'</tr>';
	$table = preg_replace("~".$tr."~Ui",'',$table,1);

	/* Remove 36th TR of table */
	$tr = get_string_between($table, '<tr', '</tr>');
	$table = preg_replace("~".$tr."~Ui",'',$table,1); 

    	echo 'Cantareira I1:'.$cantI1;
echo '<br>';
	echo 'Cantareira I2:'.$cantI2;
echo '<br>';
	echo 'Cantareira I3:'.$cantI3;
echo '<br>';
	echo 'Cantareira pluviometria do dia:'.$cantPlDia;
echo '<br>';
	echo 'Cantareira pluviometria acumulada do mes:'.$cantPlAcMes;
echo '<br>';
	echo 'Cantareira media historica do mes:'.$cantMdHistMes;
echo '<br>';
echo '<br>';

	echo 'Alto Tiete I:'.$altInd;
echo '<br>';
	echo 'Alto Tiete pluviometria do dia:'.$altPlDia;
echo '<br>';
	echo 'Alto Tiete pluviometria acumulada do mes:'.$altPlAcMes;
echo '<br>';
	echo 'Alto Tiete media historica do mes:'.$altMdHistMes;
echo '<br>';
echo '<br>';

	echo 'Guarapiranga I:'.$guaInd;
echo '<br>';
	echo 'Guarapiranga pluviometria do dia:'.$guaPlDia;
echo '<br>';
	echo 'Guarapiranga pluviometria acumulada do mes:'.$guaPlAcMes;
echo '<br>';
	echo 'Guarapiranga media historica do mes:'.$guaMdHistMes;
echo '<br>';
echo '<br>';

	echo 'Alto Cotia I:'.$alcInd;
echo '<br>';
	echo 'Alto Cotia pluviometria do dia:'.$alcPlDia;
echo '<br>';
	echo 'Alto Cotia pluviometria acumulada do mes:'.$alcPlAcMes;
echo '<br>';
	echo 'Alto Cotia media historica do mes:'.$alcMdHistMes;
echo '<br>';

	echo 'Rio Grande I:'.$rigInd;
echo '<br>';
	echo 'Rio Grande pluviometria do dia:'.$rigPlDia;
echo '<br>';
	echo 'Rio Grande pluviometria acumulada do mes:'.$rigPlAcMes;
echo '<br>';
	echo 'Rio Grande media historica do mes:'.$rigMdHistMes;
echo '<br>';
echo '<br>';

	
	echo 'Rio Claro I:'.$ricInd;
echo '<br>';
	echo 'Rio Claro pluviometria do dia:'.$ricPlDia;
echo '<br>';
	echo 'Rio Claro pluviometria acumulada do mes:'.$ricPlAcMes;
echo '<br>';
	echo 'Rio Claro media historica do mes:'.$ricMdHistMes;
?>