var dt=new Date();

        var diasem=dt.getDay();
        var dia=dt.getDate();
        var mes=dt.getMonth()+1;
        var ano=dt.getFullYear();

        var horas=dt.getHours();
        var minutos=dt.getMinutes();
        var segundos=dt.getSeconds();

        document.write(dia + "/" + mes + "/" + ano + " -- ");
        document.write(horas + ":" + minutos + ":" + segundos);