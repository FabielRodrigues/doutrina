jQuery(function($){

   $("#date").mask("99/99/9999");

   $("#date2").mask("99/99/9999");

   $("#telefone").mask("(99) 9999-9999");
   
   $("#telefone2").mask("(99) 9999-9999");

   $("#isbn").mask("9999999999999");

   $("#isbn2").mask("9999999999999");

   $("#ssn").mask("999-99-9999");

   $("#cep").mask("99999-999");

   $("#cpf").mask("999.999.999-99");
   
   $("#horas").mask("99");
   
   $("#hora1").mask("99:99");
   
   $("#hora2").mask("99:99");
   
   $('#valor').maskMoney();
   
   $('.datepicker').datepicker({
		format: "dd/mm/yyyy",
		language: "pt-BR",
		orientation: "top left",
                startDate: '-3d'
	});

});

