
function validacaoLogin(){ //Função para validar login e senha.
	var form = document.form;
	if(form.tlogin.value==''){
		alert('Por favor, insira o seu login');
		form.tlogin.focus();
		return false
	}
	if(document.form.tsenha.value==''){
		alert('Por favor, insira a sua senha');
		form.tsenha.focus();
		return false
	}
}

function validacaoCliente(formName, actionName){ //Validação dos campos para cadastro de Clientes
	var form = document.form;
	if(form.ctelefone.value==''){
		alert('Por favor, Insira um número de telefone');
		form.ctelefone.focus();
		return false;
	}
	if(form.cnome.value==''){
		alert('Por favor, Insira um nome');
		form.cnome.focus();
		return false;
	}
	if(form.ccep.value==''){
		alert('Por favor, Insira um CEP');
		form.ccep.focus();
		return false;
	}
	if(form.cende.value==''){
		alert('Por favor, Insira um endereço');
		form.cende.focus();
		return false;
	}
	if(form.cnum.value==''){
		alert('Por favor, Insira um número');
		form.cnum.focus();
		return false;
	}
	if(form.cbairro.value==''){
		alert('Por favor, Insira um bairro');
		form.cbairro.focus();
		return false;
	}
	if(form.ccidade.value==''){
		alert('Por favor, Insira uma cidade');
		form.ccidade.focus();
		return false;
	}
	if(form.cuf.value==''){
		alert('Por favor, Insira o UF');
		form.cuf.focus();
		return false;
	} else {
		var hiddenControl = document.getElementById('action');
		var theForm = document.getElementById(formName);

		hiddenControl.value = actionName;
		theForm.submit();
	}
}

function validacaoFuncionario(){ //Função para validar formulário de funcionário em 'cadfuncionario.php'
	var form = document.form;
	if(form.fnome.value==''){
		alert('Por favor, Insira um nome');
		form.fnome.focus();
		return false
	}
	if(form.fsnome.value==''){
		alert('Por favor, Insira um sobrenome');
		form.fsnome.focus();
		return false
	}
	if(form.fdtnasc.value==''){
		alert('Por favor, Insira uma data de nascimento');
		form.fdtnasc.focus();
		return false;
	}
	if(form.ftel1.value==''){
		alert('Por favor, Insira pelo menos 1 número de telefone/celular');
		form.ftel1.focus();
		return false;
	}
	if(form.fcpf.value==''){
		alert('Por favor, Insira o CPF');
		form.fcpf.focus();
		return false
	}
	if(form.frg.value==''){
		alert('Por favor, Insira o RG');
		form.frg.focus();
		return false
	}
	if(form.flogin.value==''){
		alert('Por favor, Insira um login');
		form.flogin.focus();
		return false
	}
	if(form.fsenha.value==''){
		alert('Por favor, Insira uma senha');
		form.fsenha.focus();
		return false
	}
	if(form.frsenha.value==''){
		alert('Por favor, Confirme sua senha');
		form.frsenha.focus();
		return false
	}
	if(form.fcep.value==''){
		alert('Por favor, Insira o CEP');
		form.fcep.focus();
		return false
	}
	if(form.fende.value==''){
		alert('Por favor, Insira algum Endereço');
		form.fende.focus();
		return false
	}
	if(form.fnum.value==''){
		alert('Por favor, Insira um número');
		form.fnum.focus();
		return false
	}
	if(form.fbairro.value==''){
		alert('Por favor, Insira o Bairro');
		form.fbairro.focus();
		return false
	}
	if(form.fcidade.value==''){
		alert('Por favor, Insira uma Cidade');
		form.fcidade.focus();
		return false
	}
	if(form.fuf.value==''){
		alert('Por favor, Insira o UF');
		form.fuf.focus();
		return false
	}
}

function formatar(mascara, documento){ //Função para formatação de textos
	var i = documento.value.length;
	var saida = mascara.substring(0,1);
	var texto = mascara.substring(i)
	
	if (texto.substring(0,1) != saida){
		documento.value += texto.substring(0,1);
	}
}
	
function pesquisarTelefone(formName, actionName){ //Função para redirecioar pesquisa de telefone para o action.php
	var form = document.form;
	if(form.ctelefone.value==''){
		alert('Por favor, Insira um número de telefone');
		form.ctelefone.focus();
		return false;
	} else {
		var hiddenControl = document.getElementById('action');
		var theForm = document.getElementById(formName);
		
		hiddenControl.value = actionName;
		theForm.submit();
	}
}

function habilita_cliente(){ //Função para habilitar campos para cadastro/consulta de clientes
	document.getElementById("ctelefone").disabled = false;
	document.getElementById("cnome").disabled = false;
	document.getElementById("ccep").disabled = false;
	document.getElementById("cende").disabled = false;
	document.getElementById("cnum").disabled = false;
	document.getElementById("ccomple").disabled = false;
	document.getElementById("cpref").disabled = false;
	document.getElementById("cbairro").disabled = false;
	document.getElementById("ccidade").disabled = false;
	document.getElementById("cuf").disabled = false;
}

function desabilita_cliente(){ //Função para desabilitar campos para cadastro/consulta de clientes
	document.getElementById("ctelefone").disabled = true;
	document.getElementById("cnome").disabled = true;
	document.getElementById("ccep").disabled = true;
	document.getElementById("cende").disabled = true;
	document.getElementById("cnum").disabled = true;
	document.getElementById("ccomple").disabled = true;
	document.getElementById("cpref").disabled = true;
	document.getElementById("cbairro").disabled = true;
	document.getElementById("ccidade").disabled = true;
	document.getElementById("cuf").disabled = true;
}

function validarProduto(){ //Função para validar formulário de cadastro de produtos.
	var form = document.form;
	if(form.ptipo.value==''){
		alert('Por favor, Selecione o tipo do produto!');
		return false;
	}
	if(form.ptipo.value == 1){
		if(form.pnome.value==''){
			alert('Por favor, Insira um nome para o produto');
			form.pnome.focus();
			return false;
		}
		if(form.ppreco.value==''){
			alert('Por favor, Insira o valor da pizza média');
			form.ppreco.focus();
			return false;
		}
		if(form.ppreco2.value==''){
			alert('Por favor, Insira o valor da pizza grande');
			form.ppreco2.focus();
			return false;
		}
		if(form.ppreco3.value==''){
			alert('Por favor, Insira o valor da pizza gigante');
			form.ppreco3.focus();
			return false;
		}
		if(form.ppreco4.value==''){
			alert('Por favor, Insira o valor da pizza maracanã');
			form.ppreco4.focus();
			return false;
		}
		if(form.ingre.value==''){
			alert('Por favor, Insira os ingredientes da pizza');
			form.ingre.focus();
			return false;
		}
	} else {
		if(form.ptipo.value == 2){
			if(form.pnome.value==''){
				alert('Por favor, Insira um nome para o produto');
				form.pnome.focus();
				return false;
			}
			if(form.ppreco.value==''){
				alert('Por favor, valor da bebida');
				form.ppreco.focus();
				return false;
			}
		} else {
			if(form.pnome.value==''){
				alert('Por favor, Insira um nome para o produto');
				form.pnome.focus();
				return false;
			}
			if(form.ppreco.value==''){
				alert('Por favor, valor da bebida');
				form.ppreco.focus();
				return false;
			}
			if(form.ingre.value==''){
				alert('Por favor, Insira os ingredientes do lanche');
				form.ingre.focus();
				return false;
			}
		}
	}
}

function habilitar_pizza(){ //Função que habilita os outros campos de preços para cadastro de pizza
	document.getElementById("ppreco2").disabled = false;
	document.getElementById("ppreco3").disabled = false;
	document.getElementById("ppreco4").disabled = false;
	document.getElementById("ingre").disabled = false;
}

function habilitar_bebida(){ //Função que desabilita os outros campos de preço caso não seja uma pizza.
	document.getElementById("ppreco2").disabled = true;
	document.getElementById("ppreco3").disabled = true;
	document.getElementById("ppreco4").disabled = true;
	document.getElementById("ingre").disabled = true;
}

function habilitar_lanche(){ //Função que desabilita os outros campos de preço caso não seja uma pizza.
	document.getElementById("ppreco2").disabled = true;
	document.getElementById("ppreco3").disabled = true;
	document.getElementById("ppreco4").disabled = true;
	document.getElementById("ingre").disabled = false;
}
