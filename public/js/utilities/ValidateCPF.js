/*
|--------------------------------------------------------------------------
| Validate CPF
|--------------------------------------------------------------------------
| This is a JavaScript function that return true if a CPF is valid,
| the entry is purely a string the algorithm was updated to fit my
| needed and your logic can be found on the links:
| https://www.devmedia.com.br/validar-cpf-com-javascript/23916 last access on: 2018/03/13
| https://medium.com/@osuissa/javascript-validacao-de-cpf-passo-a-passo-9428ee32c104 last access on: 2018/03/13
| any question or suggestion send me a e-mail: naninmartins@gmail.com
*/
function ValidateCPF(strCPF) {

    var Sum;
    var Mod;
    Sum = 0;

    if (strCPF.length == 14) {
        strCPF = strCPF.replace('.','');
        strCPF = strCPF.replace('.','');
        strCPF = strCPF.replace('-','');
    }

    if (equalCPF(strCPF)) {
    return false;
    }

    for (i=1; i<=9; i++) {
    Sum += parseInt(strCPF.substring(i-1, i)) * (11 - i);
    }
    Mod = (Sum * 10) % 11;

    if ((Mod == 10) || (Mod == 11))  {
        Mod = 0;
    }
    if (Mod != parseInt(strCPF[9]) ) {
        return false;
    }

    Sum = 0;
    for (i = 1; i <= 10; i++) {
        Sum += parseInt(strCPF.substring(i-1, i)) * (12 - i);
    }
    Mod = (Sum * 10) % 11;

    if ((Mod == 10) || (Mod == 11)){
        Mod = 0;
    }
    if (Mod != parseInt(strCPF[10] ) ) {
        return false;
    }
    return true;
}

function equalCPF (strCPF) {
    let equal = false;

    for (i=0; i<=9; i++) {

        let index = i.toString();
        let str = index;

        for (j=0; j<=9; j++) {
           str += index;
        }

        if (strCPF == str) {
            equal = true;
            break;
        }
    }
    return equal;
}
