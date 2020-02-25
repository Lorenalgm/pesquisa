
//função valida email
function checkEmail(valor){
    if(valor.val()){
        text = valor.val();
        pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]+(\.[A-Za-z0-9])?$/;
        if(!pattern.exec(text)){
            newAlert("E-mail inválido!",null,null,null,function(){valor.val('');valor.focus();});
            valor.val("");
        }
    }
}

//função valida período
function checkPeriodo(valor){
    if(valor.val()){
        text = valor.val();
        pattern = /^(0[1-9]|1[0-2])\/2\d{3}$/;
        if(!pattern.exec(text)){
            valor.val("");
            newAlert("Período inválido!",null,null,null,function(){valor.focus();});
        }
    }
}

//função valida data
function checkDate(valor,soano){
    if(valor.val()){
         text = valor.val().replace(/\/__/g,'');
        if(soano){
            pattern = /^((0[1-9]|[12]\d)\/(0[1-9]|1[0-2])|30\/(0[13-9]|1[0-2])|31\/(0[13578]|1[02]))(\/(19|2[0-9]{1})\d{2})?$/i;
        }else
            pattern = /^((0[1-9]|[12]\d)\/(0[1-9]|1[0-2])|30\/(0[13-9]|1[0-2])|31\/(0[13578]|1[02]))\/(19|2[0-9]{1})\d{2}$/i;
            
        if(!pattern.exec(text)){
            valor.val("");
            newAlert("Data inválida!",null,null,null,function(){valor.focus();});
        }
    }
}

//função valida data
function checkHour(valor, segundo){
        if(!valor.val())
                return;
        text = valor.val();
        pattern1 =  /^(0[0-9]|1[0-9]|2[0-3])\:[0-5][0-9]$/i;
        pattern2 =  /^(0[0-9]|1[0-9]|2[0-3])\:[0-5][0-9]\:[0-5][0-9]$/i;
        if(segundo){
                if(!pattern2.exec(text)){
                    newAlert("Horário inválido!",null,null,null,function(){valor.val('');valor.focus();});
                    valor.val("");
                }
        }else{
                if(!pattern1.exec(text)){
                    newAlert("Horário inválido!",null,null,null,function(){valor.val('');valor.focus();});
                    valor.val("");
                }
        }
}

function _cnpj(valor){
        if(valor.val()==""){
            return false;
        }
        teste = valor.val().replace(/[.]|[-]|[/]/gi, "");
        if(!teste){
                newAlert("Numero de CNPJ inválido!",null,null,null,function(){valor.val('');valor.focus();});
                return false;
        }
        num = [];
        for(i=0; i < teste.length; i++){
                num[i]= parseInt(teste.charAt(i));
        }
        soma = 0;
        cont = 5;
        for(i = 0; i < 12; i++)	{
                if(cont < 2) cont = 9;
                soma +=  num[i]*cont--;
        }
        resto = soma % 11;
        digito1 = (resto < 2) ? 0 : 11 - resto;

        cont = 6;
        soma = 0;
        for(i = 0; i < 13; i++){
                if(cont < 2) cont = 9;
                soma +=  num[i]*cont--;
        }
        resto = soma % 11;
        digito2 = (resto < 2)? 0 : 11 - resto;
        result = num[12]==digito1 && num[13]==digito2;
        if(result){
                return true;
        }else{
                newAlert("Numero de CNPJ inválido!",null,null,null,function(){valor.val('');valor.focus();});
                return false;
        }
}

function _checkInterval(ini,fim,obj){
    if(ini && fim){
        var array_ini = ini.split("/");
        var array_fim = fim.split("/");
        var dtini = new Date(array_ini[2],array_ini[1],array_ini[0]);
        var dtfim = new Date(array_fim[2],array_fim[1],array_fim[0]);
        if(dtfim < dtini){
            newAlert("Período inválido. A data final terá de ser maior ou igual à data inicial!",null,null,null,function(){obj.val('');obj.focus();});
        }
    }
}

function _cpf(valor){
        if(valor.val()==""){
            return false;
        }
        cpf = valor.val().replace(/[.]|[-]/gi, "");

        num = [
                '00000000000',
                '11111111111',
                '22222222222',
                '33333333333',
                '44444444444',
                '55555555555',
                '66666666666',
                '77777777777',
                '88888888888',
                '99999999999'
        ];
        for(i=0; i < num.length; i++){
                if(cpf == num[i]){
                        newAlert("Numero de CPF inválido!",null,null,null,function(){valor.val('');valor.focus();});
                        valor.val('');
                        valor.focus();
                        return false;
                }
        }

        var a = [];
        var b = new Number;
        var c = 11;

        for(i = 0; i< 11; i++){
                a[i] = cpf.charAt(i);
                if (i < 9) b += (a[i] * --c);
        }

        x = b % 11;
        if (x < 2) {
                a[9] = 0
        } else {
                a[9] = 11-x
        }

        b = 0;
        c = 11;
        for (y=0; y<10; y++){
                b += (a[y] * c--);
        }

        if ((x = b % 11) < 2) {
                a[10] = 0;
        } else {
                a[10] = 11-x;
        }

        if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10])){
                newAlert("Numero de CPF inválido!",null,null,null,function(){valor.val('');valor.focus();});
                
                return false;
        }

        return true;
}

function toCurrency(number) {
     
    dollars = number.split('.')[0], 
    cents = (number.split('.')[1] || '') +'00';
    dollars = dollars.split('').reverse().join('')
        .replace(/(\d{3}(?!$))/g, '$1.')
        .split('').reverse().join('');
    return dollars + ',' + cents.slice(0, 2);
}

(function($) {
	$.fn.extend({
            validMisc:function(test){
                $(this).mask(test);
                //$(this).mask(test,{onblur:null,completed:null});
            },
            validEmail:function(){
                $(this).blur(function(){checkEmail($(this));});
                $(this).blur(function(){checkEmail($(this));});
            },
            validDate:function(noano){
                var test = "";
                if(noano){
                  test = "99/99?/9999";
                }else{
                  test = "99/99/9999";  
                }
                $(this).mask(test,{onComplete:function(teste,x,e){checkDate(e,noano);}});
                $(this).blur(function(){checkDate($(this),noano);});
            },
            validHora:function(segundo){
                var test = "";
                if(segundo){
                  test = "99:99?99";
                }else{
                  test = "99:99";  
                }
                $(this).mask(test,{onComplete:function(teste,x,e){
                        checkHour(e,segundo);}});
                //$(this).blur(function(){checkHour($(this),segundo);});
            },
            validPeriodo:function(){
                var test = "99/9999";  
                $(this).mask(test,{onComplete:function(teste,x,e){checkPeriodo(e);}});
                $(this).blur(function(){checkPeriodo($(this));});
            },
            validFone:function(){
                $(this).mask("(99)9999-9999");
            },
            validCep:function(){
                $(this).mask("99.999-999");
            },
            validCPF:function(){
                $(this).mask("999.999.999-99",{onComplete:function(teste,x,e){_cpf(e);}});
                /*$(this).blur(function(){_cpf($(this));});*/
            },
            validCNPJ:function(){
                $(this).mask("99.999.999/9999-99",{onComplete:function(teste,x,e){_cnpj(e);}});
               /* $(this).blur(function(){_cnpj($(this));});*/
            },
            validMoney:function(Sblur,lenth){
            	if($(this).val())
            		$(this).val(toCurrency($(this).val()));
                $(this).maskMoney({onblur:Sblur,len:lenth});
            },
            validNumber:function(float,leng){
                    $(this).keydown(function(evt) {
                        
                        if($(this).attr("readOnly")){
                            return false;}
                            //captura o número do teclado digitado
                            var charCode = (evt.which) ? evt.which : event.keyCode;
                            //trata setas, backspaces e home, end e etc
                            if(charCode== 8 || charCode == 9 || (charCode >=35 && charCode <= 39) || charCode == 46)	return true;
                            if(leng)
                            if($(this).val().length>=leng){
                                return false;
                            }
                            if(float){//verifica se o número é inteiro ou decimal

                                    if (charCode != 190 && charCode != 194 && charCode != 188 && charCode != 110)
                                    {
                                            if (charCode > 31 && (charCode < 48 || (charCode > 57 && charCode < 96) || charCode > 105)) return false;
                                    }else{
                                            str = $(this).val();
                                            if(str.indexOf(',')==-1){
                                                return true;
                                            }else{
                                                return false;
                                            }
                                    }

                            }else if(charCode > 31 && (charCode < 48 || (charCode > 57 && charCode < 96) || charCode > 105)){
                                            return false;
                            }
                    });
            },
            validInterv:function(idFim){
                var ini= $(this);
                var fim = $(idFim);
                $(this).mask("99/99/9999",{onComplete:function(teste,x,e){checkDate(e);_checkInterval(ini.val(),fim.val(),ini);}});
                $(idFim).mask("99/99/9999",{onComplete:function(teste,x,e){checkDate(e);_checkInterval(ini.val(),fim.val(),fim);}});
                ini.blur(function(){_checkInterval(ini.val(),fim.val(),ini);});
                fim.blur(function(){_checkInterval(ini.val(),fim.val(),fim);});
            },autoComplete:function(combo){
                $(this).bind('keyup',
                	function(){
                        var input = "#"+$(this).attr('id');
                        $(combo+' option').each(
                            function(){
                                var teste = eval('/^'+$(input).val()+'/');
                                if($(this).text().search(teste)==0){
                                    $(combo).val($(this).val());
                                    return false;
                                }
                            }

                        );
                    }
                )

                $(this).bind('blur',
                    function(){
                        $(this).val('');
                    }
                )

                $(this).bind('focus',
                    function(){
                        if($(combo).val()!=""){
                            var val =$(combo+" option:selected").text().split(' - ');
                            $(this).val(val[0].trim());
                        }
                    }
                )
            }
	});
})(jQuery);


