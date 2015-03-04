$(document).ready(main);
function main(){
	$("#buscar").click(Buscar);
}

function Buscar(){
	var documento = $("#documento").val();
	var fech = $("#fecha").val();
	var cuenta = $("#cuenta").val();

	$.post("buscar_cuentas",{
		codigo: cuenta,
		fecha: fech,
		documento: documento
	},consultar);
}

function consultar(datos){
	
	$("#filas").children('tr').remove();
	datos=$.parseJSON(datos);
	var total_C=0;
	var total_D=0;
	datos.forEach(
		function(valor,key){
			if(valor['Naturaleza']=='C'){
				total_C+=(valor['Valor']*1);
			}else{
				total_D+=(valor['Valor']*1);
			}

			$("<tr>").append(
				$('<td>', { text: valor['Documento']
				}), $('<td>', { text: valor['Cedula']
				}), $('<td>', { text: valor['Codigo'] 
				}), $('<td>', { text: valor['Fecha']  
				}), $('<td>', { text: valor['Naturaleza']  
				}), $('<td>', { text: valor['Descripcion']  
				}), $('<td>', { text: valor['Valor']  
				})
				).hide().appendTo('#filas').fadeIn('slow');
		});
	$("<tr>").append(
				$('<td>', { text: 'Total debito'
				}), $('<td>', { text: '$'
				}), $('<td>', { text: total_D 
				}), $('<td>', { text: 'Total Credito'  
				}), $('<td>', { text: '$'  
				}), $('<td>', { text: total_C  
				}), $('<td>', { text: ''  
				})
				).hide().appendTo('#filas').fadeIn('slow');
	
}