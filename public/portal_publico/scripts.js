function checkSubmit(req, funcok, funccancel) {
    var json = isJson(req);
    $("#notific").html("");
    if (json[0].erro) {
        if (funccancel) {
            setTimeout(funccancel, 0001);
        }
        if (json[0].message){
            if($("#notific").attr('id')){
                $("#notific").html(json[0].message);
            }else{
                newAlert(json[0].message);
            }
            
        }
        return false;
    } else {
        if (funcok) {
            setTimeout(funcok, 0001);
        }
        if (json[0].message)
            if($("#notific").attr('id')){
                $("#notific").html(json[0].message);
            }else{
                newAlert(json[0].message);
            }
        if (json[0].url) {
            direct('', json[0].url);
        }
        return true;
    }
}

function direct(base, url) {
    document.location.href = base + url;
}

function testeMes() {
    if (!$('#data').val()) {
        $('#painel').submit();
    } else {
        alert('Selecione o mês!');
    }
}




function loading(v) {
    if (v) {
        $('#loading').modal();
    } else {
        $('#loading').modal('hide');

    }
}
function popUp(html) {
    if (html === "close") {
        $('#myModal').modal('hide');
        $('#myModal').find(".modal-dialog").eq(0).html('');
        return;
    }
    //$(".modal-dialog").html("<div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><h4 class=\"modal-title\" id=\"exampleModalLabel\">[MESSAGE]</h4></div><div class=\"modal-body\">[HTML]</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button><button type=\"button\" class=\"btn btn-primary\">Send message</button></div></div>");
    if (html.indexOf("close") === -1) {
        html = "<button type=\"button\" class=\"close fechar_tutorial\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" + html;
    }
    $('#myModal').find(".modal-dialog").eq(0).html(html);
    $('#myModal').modal();
}



function newAlert(msg, type, title_val, func) {
    var vtitle = "Atenção";
    var vtype = "error";
    if (title_val) {
        vtitle = title_val;
    }
    if (type) {
        vtype = "success";
    }
    swal({title: vtitle, text: msg, type: vtype, showConfirmButton: true}, function (isConfirm) {
        if (isConfirm) {
            if (func)
                setTimeout(func, 0001);
        }
    });
}

function newConfirm(msg, funcOk, funcCancel) {
    swal({
        title: "Atenção",
        text: msg,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, tenho certeza!",
        cancelButtonText: "Não",
        closeOnConfirm: true,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            setTimeout(funcOk, 0001);
        } else {
            if (funcCancel)
                setTimeout(funcCancel, 0001);
        }
    });

}

function verifyReturn(retorno, funcOK, funcCANCEL) {
    var json = isJson(retorno);
    if (json) {
        getInputs(json);
        setDisplay(json);
        setHtml(json);
        if (json[0].message) {
            var msg = json[0].message;
            if (json[0].campo) {
                if ($('#' + json[0].campo).attr('title') == undefined)
                    msg = msg.replace('%title%', json[0].campo);
                else
                    msg = msg.replace('%title%', $('#' + json[0].campo).attr('title'));
            }
        }
        if (json[0].erro) {
            if (funcCANCEL) {
                setTimeout(funcCANCEL, 0001);
            }
            if (msg)
                newAlert(msg);
            return false;
        }

        if (json[0].status) {
            if (msg) {
                if (json[0].directFull) {
                    var f = function () {
                        document.location.href = json[0].directFull;
                        setTimeout(funcOK, 0001);
                    };
                    newAlert(msg, true, false, f);
                } else {
                    newAlert(msg, true, false, funcOK);

                }
            } else {
                if (funcOK) {
                    setTimeout(funcOK, 0001);
                }
                if (json[0].directFull) {
                    document.location.href = json[0].directFull;
                }
            }
            return true;
        } else {
            if (json[0].directFull) {
                document.location.href = json[0].directFull;
            }
        }
    }
    return false;
}

function isJson(request) {
    try {
        JSON.parse(request);
    } catch (e) {
        return false;
    }
    return eval("(" + request + ")");
}


function getInputs(json) {
    if (json[0].keys && json[0].vals) {
        for (var w = 0; w < json[0].keys.length; w++) {
            if ($('#' + json[0].keys[w]).attr('id')) {
                $('#' + json[0].keys[w]).val(json[0].vals[w]);
            } else {
                var aux = (json[0].keys[w] + "" + json[0].vals[w]).replace(/\//gi, "\\");
                if ($('#' + aux).attr('type') === 'checkbox' || $('#' + aux).attr('type') === 'radio') {
                    $('#' + aux).prop('checked', true);
                }
            }
        }
    }
}


function setDisplay(json) {
    if (json[0].none) {
        for (var w = 0; w < json[0].none.length; w++) {
            $('#' + json[0].none[w]).hide();
        }
    }
    if (json[0].visible) {
        if (json[0].visible) {
            for (var w = 0; w < json[0].visible.length; w++) {
                $('#' + json[0].visible[w]).show();
            }
        }
    }
}


function setHtml(json) {
    if (json[0].html) {
        for (var w = 0; w < json[0].html.length; w++) {
            $('#' + json[0].idhtml[w]).html(json[0].html[w]);
        }
    }
}

function deleteRow(obj, finish) {
    var tr;
    if (typeof (obj) == "string") {
        if ($(obj).get(0).tagName.toLowerCase() != 'tr') {
            tr = $(obj).parents("tr");
        } else {
            tr = $(obj);
        }
    } else {
        if ($(obj).get(0).tagName.toLowerCase() != 'tr') {
            tr = $(obj).parents("tr").eq(0);
        } else {
            tr = $(obj);
        }
    }
    tr.remove();
    var inputsId = Array();
    var inputsName = Array();
    var i = null;
    tr.find(':input').each(function () {
        if ($(this).attr('name')) {
            if (!i) {
                i = this.id.substr(this.id.length - 1);
            }
            inputsId.push(this.id.substring(0, this.id.length - 2));
            inputsName.push($(this).attr('name').substring(0, $(this).attr('name').length - 3));
        }
    });
    var z = i
    ++i;
    while ($('#' + inputsId[0] + '_' + i).attr('id')) {
        for (var w = 0; w < inputsId.length; w++) {
            $('#' + inputsId[w] + '_' + (i)).attr('name', inputsName[w] + '[' + (i - 1) + ']');
            $('#' + inputsId[w] + '_' + (i)).attr('id', inputsId[w] + '_' + (i - 1));
        }
        ++i;
    }
    if (finish) {
        setTimeout(finish, 0001);

    }
    return z;
}

function newRow(idTable, funcLast, blast) {
    var options = {
        tableId: '',
        fLast: null,
        last: null,
        replace: '#'
    };
    if ((typeof idTable) == 'string' || idTable == null) {
        options.tableId = idTable;
        options.fLast = funcLast;
        options.last = blast;
    } else {
        $.each(idTable, function (i, item) {
            options[i] = item;
        });
    }
    if (options.tableObj) {
        var table = (options.tableObj.tagName == 'table') ? options.tableObj : $(options.tableObj).closest('table');
        var select = $(table).find('tbody:eq(0) > .newtr:eq(0)');
    } else {
        if (options.tableId) {
            var table = options.tableId;
            var select = $(options.tableId + ' > tbody:eq(0) > .newtr:eq(0)');
        } else {
            var select = $('.newtr:eq(0)');
            var table = $('.newtr:eq(0)').closest('table');
        }
    }
    var clonedRow = select.html();
    var firstInt = -1;
    if (select.parents("tbody:eq(0)")[0].rows.length > 1) {
        var idAux = $(select.closest("tbody")[0].rows[1]).find('input[type!="button"]').eq(0).attr('id');
        if (idAux)
            firstInt = parseInt(idAux.substr(idAux.lastIndexOf('_') + 1));
    }
    var intNewRowId = select.closest("tbody")[0].rows.length - 1;
    var id = null;
    if (firstInt == -1 || firstInt > intNewRowId) {
        id = firstInt + 1;
    } else {
        id = intNewRowId;
    }
    clonedRow = clonedRow.replace(eval('/' + "\_" + options.replace + '/g'), "_" + id);
    clonedRow = clonedRow.replace(eval('/' + "\\[" + options.replace + '/g'), "[" + id);
    //clonedRow = clonedRow.replace("["+options.replace, "["+id);
    if (id == 0) {
        $(table).find("tbody:eq(0) > tr").eq(0).after("<tr>" + clonedRow + "</tr>");
    } else {
        if (options.last) {
            $(table).find("tbody").eq(0).append("<tr>" + clonedRow + "</tr>");
        } else {
            $($(table).find("tbody:eq(0)")[0].rows[1]).before("<tr>" + clonedRow + "</tr>");
        }
    }
    if (options.fLast) {
        options.fLast = options.fLast.replace(eval('/' + "\_" + options.replace + '/g'), "_" + id);
        setTimeout(options.fLast, 0001);
    }
    return id;
}
