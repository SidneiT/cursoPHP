function confirmaExcluir( modulo, id ) {
	if( confirm('Deseja realmente excluir o registro?') ) {
		window.location.href = 'admin.php?modulo=' 
					+ modulo + '&acao=excluir&id=' + id;
	}
}