function dosbinga(){
    var dos = document.getElementById("dosbing");
    var dos1 = document.getElementById("dosbing1");
    var dos2 = document.getElementById("dosbing2");
    var sel=dos2.value;
    var lend1=dos.options.length;
    var lend2=dos2.options.length;
    for (i=0;i<lend2;i++){
        dos2.options[0]=null;
    }
    for (i=1;i<lend1;i++){
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode(dos.options[i].text));
        opt.value=dos.options[i].value;
        dos2.appendChild(opt);
        if(dos.options[i].value==sel){
            dos2.selectedIndex=i-1;
        }
    }
    lend2=dos2.options.length;
    for (i=0;i<lend2;i++){
        if (dos2.options[i].value==dos1.value){
            dos2.options[i]=null;
            break;
        }
    } 
}
function dosbingb(){
    var dos = document.getElementById("dosbing");
    var dos1 = document.getElementById("dosbing1");
    var dos2 = document.getElementById("dosbing2");
    var sel=dos1.value;
    var lend1=dos.options.length;
    var lend2=dos1.options.length;
    for (i=0;i<lend2;i++){
        dos1.options[0]=null;
    }
    for (i=1;i<lend1;i++){
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode(dos.options[i].text));
        opt.value=dos.options[i].value;
        dos1.appendChild(opt);
        if(dos.options[i].value==sel){
            dos1.selectedIndex=i-1;
        }
    }
    lend2=dos1.options.length;
    for (i=0;i<lend2;i++){
        if (dos1.options[i].value==dos2.value){
            dos1.options[i]=null;
            break;
        }
    } 
}